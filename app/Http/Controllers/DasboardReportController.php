<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Category;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Storage;

class DasboardReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.reports.index', [
            'reports' => Report::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    /*public function pending()
    {
        return view('dashboard.index', [
            'reports' => Report::all()
        ]);
    }*/

    /**
     * Show the form for creating a new resource.
     */
    public function create(Report $report)
    {
        return view('dashboard.reports.create', [
            'categories' => Category::all(),
            'latest_id' => $report->get('id')->max()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        /*return $request->file('image')->store('report-images');*/

        /*ddd($request);*/
        $validatedData = $request->validate([
            'date' => 'required',
            'slug' => 'required|unique:reports',
            'category_id' => 'required',
            'equipment' => 'required',
            'problem' => 'required',
            'action' => 'required',
            'image' => 'image|file|max:1024',
            'status' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('report-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Report::create($validatedData);

        return redirect('/dashboard/reports')->with('success', 'Report has been Added..');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('dashboard.reports.show', [
            'report' => $report
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        return view('dashboard.reports.edit', [
            'report' => $report,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $rules = [
            'date' => 'required',
            'category_id' => 'required',
            'equipment' => 'required',
            'problem' => 'required',
            'action' => 'required',
            'image' => 'image|file|max:1024',
            'status' => 'required'
        ];

        if ($request->slug != $report->slug) {
            $rules['slug'] = 'required|unique:reports';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('report-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Report::where('id', $report->id)->update($validatedData);

        return redirect('/dashboard/reports')->with('success', 'Report has been Updated..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        if ($report->image) {
            Storage::delete($report->image);
        }

        Report::destroy($report->id);
        return redirect('/dashboard/reports')->with('success', 'Report has been deleted..');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Report::class, 'slug', $request->equipment);
        return response()->json(['slug' => $slug]);
    }
}
