<?php

namespace App\Http\Controllers;

use App\Models\InfoWeb;
use Illuminate\Http\Request;

/**
 * Class InfoWebController
 * @package App\Http\Controllers
 */
class InfoWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infoWebs = InfoWeb::paginate();

        return view('info-web.index', compact('infoWebs'))
            ->with('i', (request()->input('page', 1) - 1) * $infoWebs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infoWeb = new InfoWeb();
        return view('info-web.create', compact('infoWeb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(InfoWeb::$rules);

        $infoWeb = InfoWeb::create($request->all());

        return redirect()->route('info-webs.index')
            ->with('success', 'InfoWeb created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infoWeb = InfoWeb::find($id);

        return view('info-web.show', compact('infoWeb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infoWeb = InfoWeb::find($id);

        return view('info-web.edit', compact('infoWeb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InfoWeb $infoWeb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoWeb $infoWeb)
    {
        request()->validate(InfoWeb::$rules);

        $infoWeb->update($request->all());

        return redirect()->route('info-webs.index')
            ->with('success', 'InfoWeb updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $infoWeb = InfoWeb::find($id)->delete();

        return redirect()->route('info-webs.index')
            ->with('success', 'InfoWeb deleted successfully');
    }
}
