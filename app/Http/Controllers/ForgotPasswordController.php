<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\ForgotPasswordService;

class ForgotPasswordController extends Controller
{
    public function forgot()
    {
        return ForgotPasswordService::forgot();
    }

    public function reset()
    {
        return ForgotPasswordService::reset();
    }
}
