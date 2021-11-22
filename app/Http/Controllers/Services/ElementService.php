<?php

namespace App\Http\Controllers\Services;

use App\Models\Element;

class ElementService
{
    public static function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'symbol' => ['required', 'string', 'max:255'],
        ];
    }

    public static function insert($element, $data)
    {
        $element->name = $data['name'];
        $element->symbol = $data['symbol'];
    }

    public static function getAllElements()
    {
        return Element::all();
    }

    public static function getOneElement($id)
    {
        return Element::find($id);
    }

    public static function getAllElementsPaginate()
    {
        return Element::orderBy('id', 'DESC')->paginate(6);
    }

    public static function delete($id, $link)
    {
        $element = self::getOneElement($id);
        try {
            ContentService::deleteTests($id, $link);
            $element->delete();
            return redirect('elements')->with('success',"Operation successfully");
        }
        catch(Exception $e){
            return redirect('elements')->with('failed',"Operation failed");
        }
    }
}
