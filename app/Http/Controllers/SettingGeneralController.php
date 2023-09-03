<?php

namespace App\Http\Controllers;

use App\Models\SettingGeneral;
use Illuminate\Http\Request;

/**
 * Class SettingGeneralController
 * @package App\Http\Controllers
 */
class SettingGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingGenerals = SettingGeneral::paginate();

        return view('setting-general.index', compact('settingGenerals'))
            ->with('i', (request()->input('page', 1) - 1) * $settingGenerals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settingGeneral = new SettingGeneral();
        return view('setting-general.create', compact('settingGeneral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SettingGeneral::$rules);

        $input = $request->all();

          if($request['logo_empresa'])
        {
            $file = $request->file('logo_empresa');
            $filepath = "image/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('logo_empresa')->move($filepath, $filename);
            $input['logo_empresa'] = $filename;
        }

        $settingGeneral = SettingGeneral::create($input);

        return redirect()->route('setting-generals.index')
            ->with('success', 'SettingGeneral created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settingGeneral = SettingGeneral::find($id);

        return view('setting-general.show', compact('settingGeneral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settingGeneral = SettingGeneral::find($id);

        return view('setting-general.edit', compact('settingGeneral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SettingGeneral $settingGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SettingGeneral $settingGeneral)
    {
        request()->validate(SettingGeneral::$rules);

        $input = $request->all();
              if($request['logo_empresa'])
        {
            $file = $request->file('logo_empresa');
            $filepath = "image/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('logo_empresa')->move($filepath, $filename);
            $input['logo_empresa'] = $filename;
        }

        $settingGeneral->update($input);

        return redirect()->route('setting-generals.index')
            ->with('success', 'SettingGeneral updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $settingGeneral = SettingGeneral::find($id)->delete();

        return redirect()->route('setting-generals.index')
            ->with('success', 'SettingGeneral deleted successfully');
    }
}
