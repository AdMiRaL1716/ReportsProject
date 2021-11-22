<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\ContentService;
use App\Http\Controllers\Services\CustomerService;
use App\Http\Controllers\Services\ElementService;
use App\Http\Controllers\Services\MethodService;
use App\Http\Controllers\Services\TestService;
use App\Http\Controllers\Services\UnitService;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $link = 'tests';

    public function tests()
    {
        $tests = TestService::getAllTestPaginate();
        return view('tests/tests', compact('tests'));
    }

    public function addTest()
    {
        $methods = MethodService::getAllMethods();
        $elements = ElementService::getAllElements();
        $units = UnitService::getAllUnits();
        $customers = CustomerService::getAllCustomers();
        return view('tests/add-test', compact('methods', 'elements', 'units', 'customers'));
    }

    public function editTest($id)
    {
        $test = TestService::getOneTest($id);
        $methods = MethodService::getAllMethods();
        $elements = ElementService::getAllElements();
        $units = UnitService::getAllUnits();
        $customers = CustomerService::getAllCustomers();
        return view('tests/edit-test', compact('test', 'methods', 'elements', 'units', 'customers'));
    }

    public function create(Request $request)
    {
        $rules = TestService::rules();
        $category = new Test();
        return ContentService::create($request, $rules, $this->link, $category);
    }

    public function update(Request $request, $id)
    {
        $test = TestService::getOneTest($id);
        $rules = TestService::rules();
        return ContentService::update($request, $rules, $this->link, $test);
    }

    public function delete($id)
    {
        return TestService::delete($id);
    }
}
