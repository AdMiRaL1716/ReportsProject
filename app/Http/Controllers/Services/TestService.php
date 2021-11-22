<?php

namespace App\Http\Controllers\Services;

use App\Models\Test;

class TestService
{
    public static function rules()
    {
        return [
            'result_one' => ['required', 'string', 'max:500'],
            'result_two' => ['required', 'string', 'max:500'],
            'result_three' => ['required', 'string', 'max:500'],
            'id_element' => ['required', 'int'],
            'id_method' => ['required', 'int'],
            'id_unit' => ['required', 'int'],
            'id_customer' => ['required', 'int'],
            'id_user' => ['required', 'int'],
        ];
    }

    public static function insert($test, $data)
    {
        $test->result_one = $data['result_one'];
        $test->result_two = $data['result_two'];
        $test->result_three = $data['result_three'];
        $test->id_element = $data['id_element'];
        $test->id_method = $data['id_method'];
        $test->id_unit = $data['id_unit'];
        $test->id_customer = $data['id_customer'];
        $test->id_user = $data['id_user'];
    }

    public static function getAllTest()
    {
        return Test::all();
    }

    public static function getOneTest($id)
    {
        return Test::find($id);
    }

    public static function getAllTestPaginate()
    {
        return Test::orderBy('id', 'DESC')->paginate(6);
    }

    public static function delete($id)
    {
        $test = self::getOneTest($id);
        try {
            $test->delete();
            return redirect('tests')->with('success',"Operation successfully");
        }
        catch(Exception $e){
            return redirect('tests')->with('failed',"Operation failed");
        }
    }
}
