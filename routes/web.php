<?php

use App\Http\Controllers\BCourseController;
use App\Http\Controllers\BMajorController;
use App\Http\Controllers\BSubjectController;
use App\Http\Controllers\BTeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\CoursesController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', [DashboardController::class, 'dashboard']);

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    // Route::get('/products/{id}', 'index')->name('home');
});

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index')->name('about');
});
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
});
Route::controller(CoursesController::class)->group(function () {
    Route::get('/courses', 'index')->name('courses');
});

Route::get('/product', function () {
    return view('product');
});
Route::post('/product', function (Request $request) {
    $res = [
        'pname' => $request->get('pname'),
        'price' => $request->get('price'),
        'qty' => $request->get('qty'),
        'discount' => $request->get('discount'),
    ];
    $amount = $res['price'] * $res['qty'] - ($res['price'] * $res['qty'] * ($res['discount'] / 100));
    $res['amount'] = $amount;
    return view('product', $res);
});

Route::prefix('/backend')->group(function () {
    Route::view('/', 'Backend.pages.index');

    Route::resource('/majors', BMajorController::class);
    Route::resource('/course', BCourseController::class);
    Route::resource('/subject', BSubjectController::class);
    Route::resource('/teacher', BTeacherController::class);
    Route::get('/teacher/create', [BTeacherController::class, 'create'])->name('teacher.create');

});