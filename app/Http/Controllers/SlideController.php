<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

/**
 * Class SlideController
 * @package App\Http\Controllers
 */
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::paginate();

        return view('slide.index', compact('slides'))
            ->with('i', (request()->input('page', 1) - 1) * $slides->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slide = new Slide();
        return view('slide.create', compact('slide'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input =$request->all();


        if($request['image'])
        {
            $file = $request->file('image');
            $filepath = "image/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('image')->move($filepath, $filename);
            $input['image'] = $filename;
        }

        $slide = Slide::create($input);

        return redirect()->route('slides.index')
            ->with('success', 'Slide created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::find($id);

        return view('slide.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);

        return view('slide.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        request()->validate(Slide::$rules);

        $slide->update($request->all());

        return redirect()->route('slides.index')
            ->with('success', 'Slide updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $slide = Slide::find($id)->delete();

        return redirect()->route('slides.index')
            ->with('success', 'Slide deleted successfully');
    }
}
