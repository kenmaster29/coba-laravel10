<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DasboardReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\User;
use App\Models\Report;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

//halaman all report
Route::get('/report', [ReportController::class, 'index']);

//halaman report by user
Route::get('/user/{user:name}', function (User $user) {
    return view('user', [
        "title" => "Report by $user->name",
        "report_posts" => $user->reports->load('category', 'user')
    ]);
});

//halaman single report
Route::get('/report/{report:slug}', [ReportController::class, 'show']);


Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Hendro Supramono",
        "email" => "hendro.supramono@sig.id",
        "image" => "hendro.jpg"
    ]);
});

Route::get('/n1ohreport', function () {
    return view('n1ohreport', [
        "title" => "NAR1 OH Report",
    ]);
});

Route::get('/shiftreport', function () {
    return view('shiftreport', [
        "title" => "Shift Report",
    ]);
});

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Report Categories',
        'categories' => Category::all()
    ]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title' => $category->name,
        'reports' => $category->reports->load('category', 'user'),
        'category' => $category->name
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

/*Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');*/

Route::get('/dashboard', function (Report $report) {
    return view('dashboard.index', [
        'reports' => $report->where('status', "0")->latest()->get()
        /*'reports' => $report->where('user_id', auth()->user()->id)->latest()->get()*/
    ]);
})->middleware('auth');


Route::get('/dashboard/reports/checkSlug', [DasboardReportController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/reports', DasboardReportController::class)->middleware('auth');

Route::resource('dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/
