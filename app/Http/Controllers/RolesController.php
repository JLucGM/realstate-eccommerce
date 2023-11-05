<?php

namespace App\Http\Controllers;

// use App\Models\roles;
use App\Http\Requests\StorerolesRequest;
use App\Http\Requests\UpdaterolesRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.role.index')->only('index');
        $this->middleware('can:admin.role.create')->only('create', 'store');
        $this->middleware('can:admin.role.edit')->only('edit', 'update');
        $this->middleware('can:admin.role.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('roles.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $role = Role::all();
        return view('roles.create', compact('permissions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorerolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create(['name' => $request->name]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index', $role)->with('success', 'El rol ha sido'.$role->name.'creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('roles.edit', compact('role','permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterolesRequest  $request
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('success','El rol ha sido actualizado con éxito.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // $roles = Role::find($role);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'El rol ha sido eliminado con éxito.');
    }
}
