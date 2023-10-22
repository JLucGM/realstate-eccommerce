<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorias;
use App\Models\TipoPropiedad;
use App\Models\Sub_categorias;
use App\Models\Monedas;
use App\Models\User;
use App\Models\PropiedadAgente;
use App\Models\PropiedadAmenities;
use App\Models\SettingGeneral;




use App\Models\Amenities;
use App\Models\AmenitiesCheck;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Ciudades;
use App\Models\Estado;
use App\Models\Paises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SettingGeneral as GlobalSettingGeneral;
use SpomkyLabs\Pki\ASN1\Type\Primitive\Real;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SettingGeneral = SettingGeneral::first();
        if (auth()->user()->hasRole('super Admin')) {
            $products = Product::with(['media'])->get();

            $products = Product::ordenar($products)->paginate(10);
        } else {

            $products = Product::join('propiedad_agente', 'propiedad_agente.product_id', '=', 'products.id')
                ->select('products.*')
                ->where('user_id', auth()->user()->id)
                ->orderBy('id', 'desc')->paginate(10);
        }


        // dd($SettingGeneral);


        return view('products.list')->with('products', $products)->with('SettingGeneral', $SettingGeneral);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function country()
    // {
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, "http://battuta.medunes.net/api/country/all/?key=COLOCAR_API_KEY");
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $country = curl_exec($ch);
    //     curl_close($ch);
    //     $country = json_decode($country);
    //     return $country;
    // }

    public function newProduct()
    {
        $categorias = Categorias::all();
        $subcat = Sub_categorias::all();
        $tipoPropiedad = TipoPropiedad::all();
        $monedas = Monedas::all();
        $amenities = Amenities::all();
        $amenitiesCheck = AmenitiesCheck::all();
        $paises = Paises::all();
        $SettingGeneral = SettingGeneral::first();

        $asignado = User::whereHas("roles", function ($q) {
            $q->Where('name', 'Vendedor');
        })->pluck('name', 'id');

        $message = "";
        return view('products.newProduct')->with('message', $message)
            ->with('amenities', $amenities)
            ->with('amenitiesCheck', $amenitiesCheck)
            ->with('categorias', $categorias)
            ->with('paises', $paises)
            ->with('SettingGeneral', $SettingGeneral)
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('monedas', $monedas)
            ->with('asignado', $asignado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $amenitiesAll = json_decode($input['comodidades']);

        $product = Product::create($input);
        $productId = $product->id;
        $folderPath = 'img/product/product_id_' . $productId;

        // GUARDA NOMBRE Y GUARDA IMAGENES DE GALLERIA
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            if (is_array($images)) {
                $nombreImagen = [];
                foreach ($images as $index => $image) {
                    $nombreImagen[$index] = [
                        'id' => $index + 1, // Asigna un ID basado en el índice del array
                        'name' => $image->getClientOriginalName()
                    ];
                    $image->move(public_path($folderPath), $image->getClientOriginalName());
                }
                $jsonImagenes = json_encode($nombreImagen);

                $product->image = $jsonImagenes;
                $product->save();
            } else {
                $nombreImagen = [
                    'id' => 1, // Asigna un ID de 1 para la única imagen
                    'name' => $images->getClientOriginalName()
                ];
                $images->move(public_path($folderPath), $images->getClientOriginalName());

                $product->image = json_encode($nombreImagen);
                $product->save();
            }
        }

        // GUARDA IMAGEN DE PORTADA
        if ($request->hasFile('portada')) {
            $image = $request->file('portada');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path($folderPath), $nombreImagen);

            $product->portada = $nombreImagen;
            $product->save();
        }

        if (auth()->user()->hasRole('super Admin')) {
            $propiedadAgente = new PropiedadAgente();
            $propiedadAgente->user_id = $input['agenteVendedor_id'];
            $propiedadAgente->product_id = $product->id;
            $propiedadAgente->save();
        } else {
            $propiedadAgente = new PropiedadAgente();
            $propiedadAgente->user_id = auth()->user()->id;
            $propiedadAgente->product_id = $product->id;
            $propiedadAgente->save();
        }

        foreach ($amenitiesAll as $a) {
            $productAmenities = new PropiedadAmenities();
            $productAmenities->product_id = $product->id;
            $productAmenities->amenities_checks_id = $a->id;

            $productAmenities->save();
        }

        return redirect()->route('product.index')->with('success', 'La propiedad se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productUpdate(request $request, $id)
    {

        $product = Product::find($id);
        // dd($product);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->tipoPropiedad_id = $request->t_propiedades;
        $product->status = $request->status;
        $product->statusActual = $request->statusActual;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->metrosCuadradosT = $request->metrosCuadradosT;

        if ($request->hasFile('image')) {
            $images = []; // Crear un arreglo vacío para almacenar los nombres de las imágenes

            foreach ($request->file('image') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->move(public_path('images'), $imageName);
                $images[] = $imageName; // Agregar el nombre de la imagen al arreglo
            }

            // Actualizar el campo "image" con el arreglo de nombres de las imágenes en la base de datos
            $product->image = $images;
        }


        $product->save();

        return redirect()->route('product.index')->with('success', 'La propiedad se ha actualizado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productEdit($id)
    {
        $product = Product::find($id);
        $categorias = Categorias::all();
        $images = json_decode($product->image);
        $tipoPropiedad = TipoPropiedad::all();
        $asignado = User::whereHas("roles", function ($q) {
            $q->Where('name', 'Vendedor');
        })->pluck('name', 'id');

        $message = "";

        return view('products.detail')->with('product', $product)->with('categorias', $categorias)->with('message', $message)->with('images', $images)->with('tipoPropiedad', $tipoPropiedad)->with('asignado', $asignado);
    }

    public function productJsonImages(Request $request, $id)
    {
        $product = Product::find($id);
        $images = json_decode($product->image, false);


        $categorias = Categorias::all();
        if ($request->hasFile('portada')) {
            $image = $request->file('portada');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path("img/product/product_id_" . $id . "/"), $nombreImagen);

            $product->portada = $nombreImagen;
            $product->save();
        }
        if ($request->hasFile('image')) {
            //     $message = "No seleccionaste ningun archivo";
            //     $product = Product::find($id);
            //     $categorias = Categorias::all();
            //     // $product->image = json_decode($product->image);
            //     return view('products.detail')->with('product', $product)->with('categorias', $categorias)->with('message', $message);
            // } else {
            $array = [];
            $file = $request->file('image');
            $count = count($file);
            // $product->image = json_decode($product->image);

            // ELIMINA LAS IMAGENES EXISTENTES
            // if (empty($product->image)) {
            // } else {

            //     $count2 = count($product->image);

            //     for ($i = 0; $i < $count2; $i++) {
            //         $url = public_path('propierties' . $id . "\\" . $product->image[$i]);
            //         if (file_exists($url)) {
            //             unlink($url);
            //         }
            //     }

            //     $product->image = "";
            //     $product->save();
            // }


            for ($i = 0; $i < $count; $i++) {
                $filepath = "img/product/product_id_" . $id . "/";
                $filename = time() . '-' . $file[$i]->getClientOriginalName();
                $uploadSucess = $file[$i]->move($filepath, $filename);
                $array[] = [
                    'id' => count($images) + $i + 1, // Asigna un nuevo ID basado en el número total de imágenes existentes más el índice actual
                    'name' => $filename
                ];
            }

            // $product->image = json_encode(array_merge($images, $array));
            $product->image = json_encode(array_merge((array) $images, $array));

            $product->save();
            // $product->image = array_merge($images, $array);
            $product->image = array_merge((array) $images, $array);
        }

        $message = "Exito al subir Archivos";

        // return view('products.detail')->with('product', $product)->with('categorias', $categorias)->with('message', $message)->with('images', $images);
        return redirect()->route('product.edit', ['id' => $product->id])->with('product', $product)->with('categorias', $categorias)->with('message', $message)->with('images', $images);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function propiedadLista($tipo)
    {
        if ($tipo == 'all') {
            $products = Product::where('publicar', 1)->paginate(12);
        } elseif ($tipo == 'Alquiler') {
            $products = Product::where('status', 'En alquiler')->where('publicar', 1)->paginate(12);
        } elseif ($tipo == 'Venta') {
            $products = Product::where('status', 'En venta')->where('publicar', 1)->paginate(12);
        } elseif ($tipo == 'AlquilerT') {
            $products = Product::where('status', 'En alquiler temporal')->where('publicar', 1)->paginate(12);
        }

        $productFooter = Product::with(['media'])->get()->take(3);
        $tipoPropiedad = TipoPropiedad::get()->take(7);
        $tipoAll = TipoPropiedad::all()->pluck('nombre', 'id');

        $paises = Paises::all();
        $estado = Estado::all();
        $ciudades = Ciudades::all();

        $setting = SettingGeneral::first();

        $max = Product::max('price');
        $min = Product::min('price');

        return view('frontend.PropiedadesLista')->with('products', $products)
            ->with('productFooter', $productFooter)
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('tipoAll', $tipoAll)
            ->with('max', $max)
            ->with('min', $min)
            ->with('paises', $paises)
            ->with('estado', $estado)
            ->with('ciudades', $ciudades)
            ->with('setting', $setting);
    }

    public function propiedadAnunciar()
    {
        $productFooter = Product::with(['media'])->get()->take(3);
        $tipoPropiedad = TipoPropiedad::get()->take(7);

        $setting = SettingGeneral::first();


        return view('frontend.Anunciar')->with('productFooter', $productFooter)
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('setting', $setting);
    }


    public function propiedadMapsAll()
    {
        try {
            $propiedad = Product::all();

            $response = ['data' => $propiedad];
        } catch (\Exception $exception) {
            return response()->json(['message' => 'There was an error retrieving the records'], 500);
        }
        return response()->json($response);
    }

    public function buscarPropiedad(Request $request)
    {
        $input = $request->all();
        $productsSearch = Product::with(['media']);
        if (isset($input['region'])) {
            $productsSearch->where('Region', $input['region']);
        }
        if (isset($input['ciudad'])) {
            $productsSearch->where('ciudad', $input['ciudad']);
        }
    
        if (isset($input['tipo_propiedad'])) {
            $productsSearch->where('tipoPropiedad_id', $input['tipo_propiedad']);
        }
    
        if (isset($input['precio'])) {
            $precio = str_replace(',', '', $input['precio']); // Eliminar las comas del valor ingresado
            $productsSearch->where('price', '<=', $precio);
        }
    
        $productsSearch = $productsSearch->get();

        $products = Product::with(['media'])->get();
        $productFooter = Product::with(['media'])->get()->take(3);
        $tipoPropiedad = TipoPropiedad::get()->take(7);
        $tipoAll = TipoPropiedad::all()->pluck('nombre', 'id');

        $setting = SettingGeneral::first();
        $max = Product::max('price');
        $min = Product::min('price');

        return view('frontend.searchPropiedad')->with('productsSearch', $productsSearch)
            ->with('products', $products)
            ->with('productFooter', $productFooter)
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('setting', $setting)
            ->with('max', $max)
            ->with('min', $min)

            ->with('tipoAll', $tipoAll);
    }

    public function productDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        $message = "Eliminado con exito";
        return redirect()->route('product.index');
    }

    public function byEstado($id)
    {
        return Estado::where('pais_id', $id)->get();
    }

    public function byEstadoCiudad($id)
    {
        return Ciudades::where('estado_id', $id)->get();
    }
}
