<?php

namespace App\Http\Controllers\Services;

use App\Models\Method;

class MethodService
{
    public static function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:methods'],
        ];
    }

    public static function insert($unit, $data)
    {
        $unit->name = $data['name'];
    }

    public static function getAllMethods()
    {
        return Method::all();
    }

    public static function getOneMethod($id)
    {
        return Method::find($id);
    }

    public static function getAllMethodsPaginate()
    {
        return Method::orderBy('id', 'DESC')->paginate(6);
    }

    public static function delete($id, $link)
    {
        $method = self::getOneMethod($id);
        try {
            ContentService::deleteTests($id, $link);
            $method->delete();
            return redirect('methods')->with('success',"Operation successfully");
        }
        catch(Exception $e){
            return redirect('methods')->with('failed',"Operation failed");
        }
    }
}
