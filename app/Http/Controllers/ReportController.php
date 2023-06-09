<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        return view('report', [
            "title" => "Report",
            "report_posts" => Report::with(['user', 'category'])->latest()->filter(request(['search']))->paginate(10)->withQueryString()

            //"report_posts" => Report::with(['date','equipment', 'author'])->latest()->get()
        ]);
    }

    public function show(Report $report)
    {
        return view('report_detail', [
            "title" => "Detail Report",
            "report_posts" => $report
        ]);
    }
}
