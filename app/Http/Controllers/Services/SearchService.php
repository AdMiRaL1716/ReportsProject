<?php

namespace App\Http\Controllers\Services;

use App\Models\Customer;

class SearchService
{
    public static function search($request)
    {
        $search = $request->input('search');
        return Customer::query()
            ->where('firstname', 'LIKE', "%{$search}%")
            ->orWhere('lastname', 'LIKE', "%{$search}%")
            ->orWhere('code', 'LIKE', "%{$search}%")
            ->leftJoin('tests', 'customers.id', '=', 'tests.id_customer')
            ->orderBy('tests.id', 'DESC')
            ->paginate(6);
    }
}
