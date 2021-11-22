<?php

namespace App\Http\Controllers\Services;

use App\Models\User;

class RoleService
{
    public static function getOneUser($id)
    {
        return User::find($id);
    }

    public static function getAllUsers()
    {
        return User::all();
    }

    public static function getAllUsersPaginate()
    {
        return User::orderBy('id')->paginate(6);
    }

    public static function updateUser($request, $id)
    {
        $user = self::getOneUser($id);
        $data = $request->input();
        try {
            if ($data['role'] == 1) {
                $user->removeRole('pre_support');
                $user->assignRole('support');
            } elseif ($data['role'] == 2) {
                $user->removeRole('support');
                $user->assignRole('pre_support');
            }
            $user->save();
            return redirect('users-roles')->with('status',"Update successfully");
        }
        catch (Exception $e) {
            return redirect('users-roles')->with('failed',"Operation failed");
        }
    }
}
