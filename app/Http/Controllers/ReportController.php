<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\ContentService;
use App\Http\Controllers\Services\CustomerService;
use App\Http\Controllers\Services\ReportService;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $link = 'reports';

    public function reports()
    {
        $reports = ReportService::getAllReportsPaginate();
        return view('reports/reports', compact('reports'));
    }

    public function addReport()
    {
        $customers = CustomerService::getAllCustomers();
        return view('reports/add-report', compact('customers'));
    }

    public function create(Request $request)
    {
        $rules = ReportService::rules();
        $category = new Report();
        return ContentService::create($request, $rules, $this->link, $category);
    }

    public function createPDF($id)
    {
        return ReportService::createPDF($id);
    }

    public function delete($id)
    {
        return ReportService::delete($id, $this->link);
    }
}
