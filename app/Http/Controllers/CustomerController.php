<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\ContentService;
use App\Http\Controllers\Services\CustomerService;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $link = 'customers';

    public function customers()
    {
        $customers = CustomerService::getAllCustomersPaginate();
        return view('customers/customers', compact('customers'));
    }

    public function addCustomer()
    {
        return view('customers/add-customer');
    }

    public function editCustomer($id)
    {
        $customer = CustomerService::getOneCustomer($id);
        return view('customers/edit-customer', compact('customer'));
    }

    public function create(Request $request)
    {
        $rules = CustomerService::rules();
        $category = new Customer();
        return ContentService::create($request, $rules, $this->link, $category);
    }

    public function update(Request $request, $id)
    {
        $customer = CustomerService::getOneCustomer($id);
        $rules = CustomerService::rules();
        return ContentService::update($request, $rules, $this->link, $customer);
    }

    public function delete($id)
    {
        return CustomerService::delete($id, $this->link);
    }
}
