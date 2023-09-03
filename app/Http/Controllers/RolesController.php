<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Http\Requests\StorerolesRequest;
use App\Http\Requests\UpdaterolesRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorerolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerolesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterolesRequest  $request
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterolesRequest $request, roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(roles $roles)
    {
        //
    }


    public function roles(){
        $roles = Roles::all();
        return view('customers.roles')->with('roles',$roles);
    }

    public function rolesEdit($id){
        $rolUnico = Roles::find($id);
        $roles = Roles::all();
        $message = "";
        return view('customers.rolEdit')->with('rolUnico',$rolUnico)->with('roles',$roles)->with('message',$message);
    }

    public function rolesUpdate(Request $request, $id){
        $roles = Roles::find($id);
        $roles->name = $request->name;
        $roles->rol = $request->rol;
        $roles->save();
        // dd("enterado");
        $message = "Datos cargados correctamente";
        return view('customers.rolEdit')->with('rolUnico',$roles)->with('message',$message);
    }
    public function rolesDelete(Request $request, $id){
        $roles = Roles::find($id);
        $roles->delete();
        // dd("enterado");
        $message = "Eliminado con exito";
        return redirect()->route('rolex.index');
    }


}
