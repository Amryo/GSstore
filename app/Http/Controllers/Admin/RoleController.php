<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('roles.view-any');
        $roles = Role::paginate();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Gate::authorize('roles.create');
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Gate::authorize('roles.create');
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array',
        ]);

        $role = Role::create($request->all());
        $success = $request->session()->flash('sucess', 'Roles (' . $role->name . ') added successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('roles.update');
        $role = Role::findOrfail($id);
        return view('admin.roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('roles.update');
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array',
        ]);
        $role = Role::findorfail($id);
        $role->update($request->all());
        $success = $request->session()->flash('success', 'Roles (' . $role->name . ') Updated successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('roles.delete');
        $role = Role::findorfail($id);
        $role->delete();
        $success = session()->flash('success', 'Roles Deleted successfully');
        return redirect()->route('roles.index');
    }
}
