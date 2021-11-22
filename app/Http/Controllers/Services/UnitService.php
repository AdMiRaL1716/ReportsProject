<?php

namespace App\Http\Controllers\Services;

use App\Models\Unit;

class UnitService
{
    public static function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:units'],
        ];
    }

    public static function insert($unit, $data)
    {
        $unit->name = $data['name'];
    }

    public static function getAllUnits()
    {
        return Unit::all();
    }

    public static function getOneUnit($id)
    {
        return Unit::find($id);
    }

    public static function getAllUnitsPaginate()
    {
        return Unit::orderBy('id', 'DESC')->paginate(6);
    }

    public static function delete($id, $link)
    {
        $unit = self::getOneUnit($id);
        try {
            ContentService::deleteTests($id, $link);
            $unit->delete();
            return redirect('units')->with('success',"Operation successfully");
        }
        catch(Exception $e){
            return redirect('units')->with('failed',"Operation failed");
        }
    }
}
