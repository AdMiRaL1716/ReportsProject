<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\RoleService;
use App\Http\Controllers\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $link = 'customs';

    public function settings()
    {
        return view('custom/customs');
    }

    public function password()
    {
        return view('custom/edit-password');
    }

    public function userName()
    {
        return view('custom/edit-login');
    }

    public function email()
    {
        return view('custom/edit-email');
    }

    public function changePassword(Request $request, $id)
    {
        $user = RoleService::getOneUser($id);
        $rules = SettingService::changePasswordRules();
        $setting = 'password';
        return SettingService::update($request, $rules, $this->link, $user, $setting);
    }

    public function changeUserName(Request $request, $id)
    {
        $user = RoleService::getOneUser($id);
        $rules = SettingService::changeUserNameRules();
        $setting = 'login';
        return SettingService::update($request, $rules, $this->link, $user, $setting);
    }

    public function changeEmail(Request $request, $id)
    {
        $user = RoleService::getOneUser($id);
        $rules = SettingService::changeEmailRules();
        $setting = 'email';
        return SettingService::update($request, $rules, $this->link, $user, $setting);
    }
}
