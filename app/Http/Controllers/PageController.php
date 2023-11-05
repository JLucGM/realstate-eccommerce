<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\SettingGeneral;
use Illuminate\Http\Request;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.pages.index')->only('index');
        $this->middleware('can:admin.pages.create')->only('create', 'store');
        $this->middleware('can:admin.pages.edit')->only('edit', 'update');
        $this->middleware('can:admin.pages.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('page.index', compact('pages'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page();
        return view('page.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Page::$rules);

        $input = $request->all();
        $slug = strtolower($input['name']);
        $slugFinal = str_replace(' ', '-', $slug);

        $input['slug'] = $slugFinal;
        // dd($input);
        $post =  Page::create($input);

        return redirect()->route('pages.index')
            ->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);

        return view('page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view('page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        request()->validate(Page::$rules);

        $input = $request->all();
        $slug = strtolower($input['name']);
        $slugFinal = str_replace(' ', '-', $slug);

        $input['slug'] = $slugFinal;

        $page->update($input);


        return redirect()->route('pages.index')
            ->with('success', 'Page updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $page = Page::find($id)->delete();

        return redirect()->route('pages.index')
            ->with('success', 'Page deleted successfully');
    }

    public function page($slug)
    {
            $pageShow = Page::where('slug', $slug)->where('status', 1)->get();
            $pages = Page::where('status', 1)->get();
            $setting = SettingGeneral::first();

            return view('frontend.pages')
            ->with('setting', $setting)
            ->with('pages', $pages)
            ->with('pageShow', $pageShow);


    }
}
