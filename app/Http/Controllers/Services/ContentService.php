<?php

namespace App\Http\Controllers\Services;

use App\Models\Report;
use App\Models\Test;
use Illuminate\Support\Facades\Validator;

class ContentService
{
    public static function choiceOption($link, $element, $data)
    {
        switch ($link) {
            case 'elements':
                ElementService::insert($element, $data);
                break;
            case 'customers':
                CustomerService::insert($element, $data);
                break;
            case 'units':
                UnitService::insert($element, $data);
                break;
            case 'methods':
                MethodService::insert($element, $data);
                break;
            case 'tests':
                TestService::insert($element, $data);
                break;
            case 'reports':
                ReportService::insert($element, $data);
                break;
        }
    }

    public static function create($request, $rules, $link, $category)
    {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                $element = $category;
                self::choiceOption($link, $element, $data);
                $element->save();
                return redirect($link)->with('success', "Operation successfully");
            } catch (Exception $e) {
                return redirect($link)->with('failed', "Operation failed");
            }
        }
    }

    public static function update($request, $rules, $link, $element)
    {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $data = $request->input();
            try {
                self::choiceOption($link, $element, $data);
                $element->save();
                return redirect($link)->with('success',"Operation successfully");
            }
            catch(Exception $e) {
                return redirect($link)->with('failed',"Operation failed");
            }
        }
    }

    public static function deleteTests($id, $link)
    {
        $tests = '';
        switch ($link) {
            case 'elements':
                $tests = Test::query()->where('id_element', $id)->get();
                break;
            case 'customers':
                $tests = Test::query()->where('id_customer', $id)->get();
                break;
            case 'units':
                $tests = Test::query()->where('id_unit', $id)->get();
                break;
            case 'methods':
                $tests = Test::query()->where('id_method', $id)->get();
                break;
        }
        if (count($tests) != 0) {
            foreach ($tests as $test) {
                switch ($link) {
                    case 'elements':
                        $test = Test::query()->where('id_element', $id)->delete();
                        break;
                    case 'customers':
                        $test = Test::query()->where('id_customer', $id)->delete();
                        break;
                    case 'units':
                        $test = Test::query()->where('id_unit', $id)->delete();
                        break;
                    case 'methods':
                        $test = Test::query()->where('id_method', $id)->delete();
                        break;
                }
            }
        }
    }

    public static function deleteReports($id, $link)
    {
        $reports = '';
        switch ($link) {
            case 'customers':
                $reports = Report::query()->where('id_customer', $id)->get();
                break;
            case 'reports':
                $reports = Report::query()->where('id', $id)->get();
                break;
        }
        if (count($reports) != 0) {
            foreach ($reports as $report) {
                switch ($link) {
                    case 'customers':
                        $report = Report::query()->where('id_customer', $id)->delete();
                        break;
                    case 'reports':
                        $report = Report::query()->where('id', $id)->delete();
                        break;
                }
            }
        }
    }
}
