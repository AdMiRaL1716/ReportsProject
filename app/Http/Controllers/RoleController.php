<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllUsers()
    {
        $users = RoleService::getAllUsersPaginate();
        return view('users/users', compact('users'));
    }

    public function editRole($id)
    {
        $user = RoleService::getOneUser($id);
        return view('users/edit-user-role', compact('user'));
    }

    public function updateRole(Request $request, $id)
    {
        return RoleService::updateUser($request, $id);
    }
}
