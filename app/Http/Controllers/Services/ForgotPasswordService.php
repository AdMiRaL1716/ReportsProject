<?php


namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordService
{
    public static function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);
        Password::sendResetLink($credentials);
        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }

    public static function reset() {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);
        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });
        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["msg" => "Invalid token provided"], 400);
        }
        return response()->json(["msg" => "Password has been successfully changed"]);
    }
}
