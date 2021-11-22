<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function language($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }
}
