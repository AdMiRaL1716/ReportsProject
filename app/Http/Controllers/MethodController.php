<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\ContentService;
use App\Http\Controllers\Services\MethodService;
use App\Models\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $link = 'methods';

    public function methods()
    {
        $methods = MethodService::getAllMethodsPaginate();
        return view('methods/methods', compact('methods'));
    }

    public function addMethod()
    {
        return view('methods/add-method');
    }

    public function editMethod($id)
    {
        $method = MethodService::getOneMethod($id);
        return view('methods/edit-method', compact('method'));
    }

    public function create(Request $request)
    {
        $rules = MethodService::rules();
        $category = new Method();
        return ContentService::create($request, $rules, $this->link, $category);
    }

    public function update(Request $request, $id)
    {
        $method = MethodService::getOneMethod($id);
        $rules = MethodService::rules();
        return ContentService::update($request, $rules, $this->link, $method);
    }

    public function delete($id)
    {
        return MethodService::delete($id, $this->link);
    }
}
