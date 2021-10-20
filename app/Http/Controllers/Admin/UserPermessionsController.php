<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UserPermessionsController extends Controller
{
    public function index()
    {
        Gate::authorize('roles.view-any');
        $users = User::get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create($id = null)
    {

        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.create', ['user' => $user, 'roles' => $roles]);
    }

    public function store(Request $request, $id)
    {
        $obj = new RoleUser;
        $obj->create([
            'user_id' => $id,
            'role_id' => $request->post('role_id'),
        ]);
        return redirect()->back();
    }
}
