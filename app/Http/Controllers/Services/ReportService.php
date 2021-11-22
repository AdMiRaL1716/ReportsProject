<?php

namespace App\Http\Controllers\Services;

use App\Models\Report;
use Barryvdh\DomPDF\Facade as PDF;

class ReportService
{
    public static function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'id_customer' => ['required', 'int'],
            'id_user' => ['required', 'int'],
        ];
    }

    public static function insert($report, $data)
    {
        $report->name = $data['name'];
        $report->start_date = $data['start_date'];
        $report->end_date = $data['end_date'];
        $report->id_customer = $data['id_customer'];
        $report->id_user = $data['id_user'];
    }

    public static function getAllReports()
    {
        return Report::all();
    }

    public static function getOneReport($id)
    {
        return Report::find($id);
    }

    public static function getAllReportsPaginate()
    {
        return Report::orderBy('id', 'DESC')->paginate(6);
    }

    public static function createPDF($id)
    {
        $report = self::getOneReport($id);
        $customer = CustomerService::getOneCustomer($report->id_customer);
        $tests = TestService::getAllTest();
        try {
            $pdf = PDF::loadView('reports/pdf', compact('report', 'customer', 'tests'))->setPaper('A4', 'letter');
            $fileName =  $id . '.' . 'pdf' ;
            return $pdf->download($fileName);
        }
        catch(Exception $e){
            return redirect('reports')->with('failed',"Operation failed");
        }
    }

    public static function delete($id, $link)
    {
        try {
            ContentService::deleteReports($id, $link);
            return redirect('reports')->with('success',"Operation successfully");
        }
        catch(Exception $e){
            return redirect('reports')->with('failed',"Operation failed");
        }
    }
}
