<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\MethodService;
use App\Http\Controllers\Services\SearchService;
use App\Http\Controllers\Services\UnitService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        $results = SearchService::search($request);
        $methods = MethodService::getAllMethods();
        $units = UnitService::getAllUnits();
        return view('search', compact('results', 'methods', 'units'));
    }
}
