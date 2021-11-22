<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingService
{
    public static function changePasswordRules()
    {
        return [
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public static function changeUserNameRules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public static function changeEmailRules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];
    }

    public static function update($request, $rules, $link, $user, $setting)
    {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $data = $request->input();
            try {
                switch ($setting) {
                    case 'email':
                        $user->email = $data['email'];
                        $user->save();
                        break;
                    case 'login':
                        $user->name = $data['name'];
                        $user->save();
                        break;
                    case 'password':
                        if (!Hash::check($data['current_password'], $user->password)) {
                            return back()->with('error', 'Current password does not match!');
                        }
                        else {
                            $user->password = Hash::make($data['password']);
                            $user->save();
                        }
                        break;
                }
                return redirect($link)->with('success',"Operation successfully");
            }
            catch(Exception $e) {
                return redirect($link)->with('failed',"Operation failed");
            }
        }
    }
}
