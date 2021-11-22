<?php

namespace App\Http\Controllers\Services;

use App\Models\Customer;

class CustomerService
{
    public static function rules()
    {
        return [
            'code' => ['required', 'int', 'digits:11'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ];
    }

    public static function insert($customer, $data)
    {
        $customer->code = $data['code'];
        $customer->firstname = $data['firstname'];
        $customer->lastname = $data['lastname'];
        $customer->address = $data['address'];
        $customer->phone = $data['phone'];
        $customer->email = $data['email'];
    }

    public static function getAllCustomers()
    {
        return Customer::all();
    }

    public static function getOneCustomer($id)
    {
        return Customer::find($id);
    }

    public static function getAllCustomersPaginate()
    {
        return Customer::orderBy('id', 'DESC')->paginate(6);
    }

    public static function delete($id, $link)
    {
        $customer = self::getOneCustomer($id);
        try {
            ContentService::deleteTests($id, $link);
            ContentService::deleteReports($id, $link);
            $customer->delete();
            return redirect('customers')->with('success',"Operation successfully");
        }
        catch(Exception $e){
            return redirect('customers')->with('failed',"Operation failed");
        }
    }
}
