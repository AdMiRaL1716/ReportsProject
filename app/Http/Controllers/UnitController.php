<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\ContentService;
use App\Http\Controllers\Services\UnitService;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $link = 'units';

    public function units()
    {
        $units = UnitService::getAllUnitsPaginate();
        return view('units/units', compact('units'));
    }

    public function addUnit()
    {
        return view('units/add-unit');
    }

    public function editUnit($id)
    {
        $unit = UnitService::getOneUnit($id);
        return view('units/edit-unit', compact('unit'));
    }

    public function create(Request $request)
    {
        $rules = UnitService::rules();
        $category = new Unit();
        return ContentService::create($request, $rules, $this->link, $category);
    }

    public function update(Request $request, $id)
    {
        $unit = UnitService::getOneUnit($id);
        $rules = UnitService::rules();
        return ContentService::update($request, $rules, $this->link, $unit);
    }

    public function delete($id)
    {
        return UnitService::delete($id, $this->link);
    }
}
