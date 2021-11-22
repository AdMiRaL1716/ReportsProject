<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\ElementService;
use App\Http\Controllers\Services\ContentService;
use App\Models\Element;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $link = 'elements';

    public function elements()
    {
        $elements = ElementService::getAllElementsPaginate();
        return view('elements/elements', compact('elements'));
    }

    public function addElement()
    {
        return view('elements/add-element');
    }

    public function editElement($id)
    {
        $element = ElementService::getOneElement($id);
        return view('elements/edit-element', compact('element'));
    }

    public function create(Request $request)
    {
        $rules = ElementService::rules();
        $category = new Element();
        return ContentService::create($request, $rules, $this->link, $category);
    }

    public function update(Request $request, $id)
    {
        $element = ElementService::getOneElement($id);
        $rules = ElementService::rules();
        return ContentService::update($request, $rules, $this->link, $element);
    }

    public function delete($id)
    {
        return ElementService::delete($id, $this->link);
    }
}
