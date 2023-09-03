<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ContactosPropiedadController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MensajesSoporteController;
use App\Http\Controllers\TicketChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['cors']], function () {

// index routing via Route feature
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/','/home');

/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/
// Route::view('/Dashboard', 'dashboard');

// Route::view('/', [App\Http\Controllers\userController::class, 'indexView']);
Route::get('/Dashboard', [App\Http\Controllers\userController::class, 'indexView'])->name('Dashboard');

// Route::prefix('Customers')->group(function () {
//     Route::redirect('/', '/Customers/List');
//     Route::view('List', 'customers/list');
//     Route::view('Detail', 'customers/detail');
// });
// roles
Route::get('/roles', [App\Http\Controllers\RolesController::class, 'roles'])->name('roles.index');
Route::get('/rolesEdit{id}', [App\Http\Controllers\RolesController::class, 'rolesEdit'])->name('roles.edit');
Route::patch('/rolesUpdate{id}', [App\Http\Controllers\RolesController::class, 'rolesUpdate'])->name('roles.update');
Route::get('/rolesDelete{id}', [App\Http\Controllers\RolesController::class, 'rolesDelete'])->name('roles.delete');



// User
Route::get('/Usuarios', [App\Http\Controllers\userController::class, 'usuarios'])->name('user.index');
Route::get('/UsuariosEdit{id}', [App\Http\Controllers\userController::class, 'usuariosEdit'])->name('user.edit');
Route::patch('/UsuariosUpdate{id}', [App\Http\Controllers\userController::class, 'usuariosUpdate'])->name('user.update');
Route::get('/UsuarioLogin', [App\Http\Controllers\userController::class, 'usuarioLogin'])->name('user.login');
Route::get('/logout',[App\Http\Controllers\userController::class, 'destroy'])->name('login.destroy');
Route::post('/register',[App\Http\Controllers\userController::class, 'store'])->name('register.store');
Route::get('/userDelete{id}', [App\Http\Controllers\userController::class, 'usersDelete'])->name('user.delete');
Route::get('/nuevoUsuario', [App\Http\Controllers\userController::class, 'newUser'])->name('new.user');
Route::post('/storeUsuario', [App\Http\Controllers\userController::class, 'storeUser'])->name('store.user');

//usuario del formulario de anunciar

Route::post('/storeUsuario-anunciar', [App\Http\Controllers\userController::class, 'storeUserAnunciar'])->name('store.user-anunciar');

//usuario formulario de contacto del home
Route::post('/storeUsuario-contacto', [App\Http\Controllers\userController::class, 'storeUserContacto'])->name('store.user-contacto');



//Product
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

Route::get('/propiedad-lista/{tipo}', [App\Http\Controllers\ProductController::class, 'propiedadLista'])->name('propiedad.lista');
Route::get('/propiedad-anunciar', [App\Http\Controllers\ProductController::class, 'propiedadAnunciar'])->name('propiedad.anunciar');



Route::get('producto/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('producto.show');

Route::get('productoDelete/{id}', [App\Http\Controllers\ProductController::class, 'productDelete'])->name('propiedad.delete');


Route::get('propiedadesAll', [App\Http\Controllers\ProductController::class, 'propiedadMapsAll'])->name('propiedadesMaps');

Route::post('buscarPropiedad', [App\Http\Controllers\ProductController::class, 'buscarPropiedad'])->name('buscarPropiedad');




// Notification
Route::group(['middleware' => 'auth'],function(){
    Route::POST('store-token', [App\Http\Controllers\NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
    Route::POST('send-web-notification', [App\Http\Controllers\NotificationSendController::class, 'sendNotification'])->name('send.web-notification');
    Route::GET('notification/list', [App\Http\Controllers\NotificationSendController::class, 'listNotification'])->name('notification.list');
    Route::GET('notification', [App\Http\Controllers\NotificationSendController::class, 'newNotification'])->name('notification.new');
});


// push notification
//make a push notification.
Route::get('/push',[App\Http\Controllers\PushController::class, 'push'])->name('push');

//store a push subscriber.
Route::post('/push',[App\Http\Controllers\PushController::class, 'store']);



// Route::get('/newProduct', [App\Http\Controllers\ProductController::class, 'newProduct'])->name('new.product');
Route::post('/storeProducto', [App\Http\Controllers\ProductController::class, 'store'])->name('store.product');
Route::get('/productEdit{id}', [App\Http\Controllers\ProductController::class, 'productEdit'])->name('product.edit');
Route::patch('/productUpdate{id}', [App\Http\Controllers\ProductController::class, 'productUpdate'])->name('product.update');
Route::patch('/productJsonEdit{id}', [App\Http\Controllers\ProductController::class, 'productJsonImages'])->name('pjson.images');

    Route::get('/newProduct', [App\Http\Controllers\ProductController::class, 'newProduct'])->name('new.product');




// Payment Gateway
Route::get('/paymentGateway', [App\Http\Controllers\PaymentGatewayController::class, 'index'])->name('paymentGateway.index');
Route::get('/paymentEdit{id}', [App\Http\Controllers\PaymentGatewayController::class, 'paymentEdit'])->name('payment.edit');
Route::patch('/paymentUpdate{id}', [App\Http\Controllers\PaymentGatewayController::class, 'paymentUpdate'])->name('payment.update');

// SEO
Route::get('/seo', [App\Http\Controllers\SeoController::class, 'index'])->name('seo.index');
Route::patch('/seoUpdate{id}', [App\Http\Controllers\SeoController::class, 'seoUpdate'])->name('seo.update');

//cupon
Route::get('/Coupons', [App\Http\Controllers\CouponController::class, 'index'])->name('cupon.index');
Route::post('/RedeemCoupon', [App\Http\Controllers\CouponController::class , 'canjearCupon'])->name('canjear.cupon');
Route::get('/cupondit{id}', [App\Http\Controllers\CouponController::class, 'cuponEdit'])->name('cupon.edit');
Route::patch('/cuponUpdate{id}', [App\Http\Controllers\CouponController::class, 'cuponUpdate'])->name('cupon.update');
Route::get('/addCoupon', [App\Http\Controllers\CouponController::class, 'cuponAdd'])->name('add.cupon');
Route::post('/newCoupon', [App\Http\Controllers\CouponController::class, 'newCupon'])->name('new.cupon');

//Categorias
Route::get('/Categorias', [App\Http\Controllers\CategoriasController::class, 'index'])->name('cat.index');
Route::get('/editCategorias{id}', [App\Http\Controllers\CategoriasController::class, 'edit'])->name('cat.edit');
Route::get('/createCategorias', [App\Http\Controllers\CategoriasController::class, 'create'])->name('cat.create');
Route::post('/newCategorias', [App\Http\Controllers\CategoriasController::class, 'store'])->name('cat.store');
Route::patch('/CategoriasUpdate{id}', [App\Http\Controllers\CategoriasController::class, 'update'])->name('cat.update');

Route::get('categorias/{id}', [App\Http\Controllers\CategoriasController::class, 'categoriaDelete'])->name('cat.delete');


//subCategorias 
Route::get('/subCategorias', [App\Http\Controllers\SubCategoriasController::class, 'index'])->name('subcat.index');
Route::get('/editsubCategorias{id}', [App\Http\Controllers\SubCategoriasController::class, 'edit'])->name('subcat.edit');
Route::get('/createsubCategorias', [App\Http\Controllers\SubCategoriasController::class, 'create'])->name('subcat.create');
Route::post('/newsubCategorias', [App\Http\Controllers\SubCategoriasController::class, 'store'])->name('subcat.store');
Route::patch('/subCategoriasUpdate{id}', [App\Http\Controllers\SubCategoriasController::class, 'update'])->name('subcat.update');

// Ciudades
Route::get('/Ciudades', [App\Http\Controllers\CiudadesController::class, 'index'])->name('city.index');
Route::get('/editCiudades{id}', [App\Http\Controllers\CiudadesController::class, 'edit'])->name('city.edit');
Route::get('/createCiudades', [App\Http\Controllers\CiudadesController::class, 'create'])->name('city.create');
Route::post('/newCiudades', [App\Http\Controllers\CiudadesController::class, 'store'])->name('city.store');
Route::patch('/CiudadesUpdate{id}', [App\Http\Controllers\CiudadesController::class, 'update'])->name('city.update');

Route::get('ciudad/{id}', [App\Http\Controllers\CiudadesController::class, 'ciudadDelete'])->name('city.delete');


//Fidelizacion
Route::get('/Fidelizacion', [App\Http\Controllers\CustomerLoyaltiesController::class, 'index'])->name('fidel.index');
Route::get('/editFidelizacion{id}', [App\Http\Controllers\CustomerLoyaltiesController::class, 'edit'])->name('fidel.edit');
Route::get('/createFidelizacion', [App\Http\Controllers\CustomerLoyaltiesController::class, 'create'])->name('fidel.create');
Route::post('/newFidelizacion', [App\Http\Controllers\CustomerLoyaltiesController::class, 'store'])->name('fidel.store');
Route::patch('/fidelizacionUpdate{id}', [App\Http\Controllers\CustomerLoyaltiesController::class, 'update'])->name('fidel.update');

//startPOPUP
Route::get('/spop', [App\Http\Controllers\StartPOPUPController::class, 'index'])->name('spop.index');
Route::PATCH('/spop', [App\Http\Controllers\StartPOPUPController::class, 'update'])->name('spop.update');


// Enviando Pedido
Route::post('/enviandoPedido', [App\Http\Controllers\SalesController::class, 'enviandoPedido'])->name('enviando.pedido');



//  Carrito de compras
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');


// Tratando de usar ajax
Route::get('/country', [ProductController::class, 'country'])->name('country');

Route::resource('contactos', ContactoController::class);
Route::resource('contactos-propiedads', ContactosPropiedadController::class);
Route::get('contactos-propiedad/{id}', [ContactosPropiedadController::class, 'index'])->name('contactos-propiedad.index');
Route::get('/contacto-web', [App\Http\Controllers\ContactosPropiedadController::class, 'contactoWeb'])->name('contactacto.web');


Route::resource('tasks', TaskController::class);

Route::get('/tasksStatus/{id}/{taskId}', [App\Http\Controllers\TaskController::class, 'taskStatus'])->name('taskStatus.edit');


Route::resource('mensajes-soportes', MensajesSoporteController::class);
Route::resource('ticketchats', TicketChatController::class);

Route::resource('slides', App\Http\Controllers\SlideController::class);
Route::resource('info-webs', App\Http\Controllers\InfoWebController::class);

Route::resource('testimonios', App\Http\Controllers\TestimonioController::class);
Route::resource('setting-generals', App\Http\Controllers\SettingGeneralController::class);

Route::resource('amenities-checks', App\Http\Controllers\AmenitiesCheckController::class);



Route::get('markAsRead',[App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('markAsRead');


Route::resource('negocios', App\Http\Controllers\NegocioController::class);


Route::get('/negocioStatus/{status}/{negocioId}', [App\Http\Controllers\NegocioController::class, 'negocioStatus'])->name('negocioStatus.edit');

    Route::resource('tags',TagController::class)->names('tags');
    Route::resource('posts',PostController::class)->names('posts');











Route::view('/Shipping', 'shipping');
Route::view('/Discount', 'discount');

Route::prefix('Products')->group(function () {
    Route::redirect('/', '/Products/List');
    Route::view('List', 'products/list');
    Route::view('Detail', 'products/detail');
});

Route::prefix('Orders')->group(function () {
    Route::redirect('/', '/Orders/List');
    Route::view('List', 'orders/list');
    Route::view('Detail', 'orders/detail');
});


Route::prefix('Storefront')->group(function () {
    Route::redirect('/', '/Storefront/Home');
    Route::view('Home', 'storefront/home');
    Route::view('Filters', 'storefront/filters');
    Route::view('Categories', 'storefront/categories');
    Route::view('Detail', 'storefront/detail');
    Route::view('Cart', 'storefront/cart');
    Route::view('Checkout', 'storefront/checkout');
    Route::view('Invoice', 'storefront/invoice');
});

Route::prefix('Settings')->group(function () {
    Route::view('/', 'settings/index');
    Route::view('General', 'settings/general');
});
});


Route::get('/blog', [BlogController::class,'index'])->name('blog.index');
Route::get('/blog/show/{post}', [BlogController::class,'show'])->name('blog.show');
Route::get('/blog/categories/{category}',[BlogController::class,'category'])->name('blog.category');
Route::get('blog/tags/{tag}',[BlogController::class,'tag'])->name('blog.tag');
Route::post('blog/show/{post}',[BlogController::class,'store'])->name('blog.comments.store');

Auth::routes();

