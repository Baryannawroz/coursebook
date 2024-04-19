<?php

use App\Http\Controllers\DeliveryPlanController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ModelinfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SubjectContentController;
use App\Http\Controllers\SubjectController;
use App\Models\DeliveryPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties');
    Route::get('/faculty/create', [FacultyController::class, 'create'])->name('faculty.create');
    Route::post('/faculty/store', [FacultyController::class, 'store'])->name('faculty.store');
    Route::get('/faculty/{faculty}/edit', [FacultyController::class, 'edit'])->name('faculty.edit');
    Route::post('/faculty/{faculty}/update', [FacultyController::class, 'update'])->name('faculty.update');

    Route::get('/stages', [StageController::class, 'index'])->name('stages');
    Route::get('/stage/create', [StageController::class, 'create'])->name('stage.create');
    Route::post('/stage/store', [StageController::class, 'store'])->name('stage.store');
    Route::get('/stage/{stage}/edit', [StageController::class, 'edit'])->name('stage.edit');
    Route::post('/stage/{stage}/update', [StageController::class, 'update'])->name('stage.update');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
    Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/department/{department}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('/department/{department}/update', [departmentController::class, 'update'])->name('department.update');

    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects');
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject/store', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/{subject}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::post('/subject/{subject}/update', [SubjectController::class, 'update'])->name('subject.update');

    Route::get('/contents', [SubjectContentController::class, 'index'])->name('contents');
    Route::get('/content/create', [SubjectContentController::class, 'create'])->name('content.create');
    Route::post('/content/store', [SubjectContentController::class, 'store'])->name('content.store');
    Route::get('/content/{subjectContent}/edit', [SubjectContentController::class, 'edit'])->name('content.edit');
    Route::post('/content/{subjectContent}/update', [SubjectContentController::class, 'update'])->name('content.update');

    Route::get('/models', [ModelinfoController::class, 'index'])->name('models');
    Route::get('/model/create', [ModelinfoController::class, 'create'])->name('model.create');
    Route::post('/model/store', [ModelinfoController::class, 'store'])->name('model.store');
    Route::get('/model/{modelinfo}/edit', [ModelinfoController::class, 'edit'])->name('model.edit');
    Route::post('/model/{modelinfo}/update', [ModelinfoController::class, 'update'])->name('model.update');
    Route::get('/model/{modelinfo}/show', [ModelinfoController::class, 'show'])->name('model.show');
    Route::get('/model/{modelinfo}/related', [ModelinfoController::class, 'related'])->name('model.related');

    // Route::get('/models', [ModelinfoController::class, 'index'])->name('models');
    // Route::get('/model/create', [ModelinfoController::class, 'create'])->name('model.create');
    Route::post('/plandelivery/store', [DeliveryPlanController::class, 'store'])->name('plandelivery.store');
    Route::delete('/plandelivery/delete/{DeliveryPlan}', [DeliveryPlanController::class, 'destroy'])->name('plandelivery.destroy');

    Route::put('/plandelivery/update/{DeliveryPlan}', [DeliveryPlanController::class, 'update'])->name('plandelivery.update');
    Route::get('/model/{modelinfo}/show', [ModelinfoController::class, 'show'])->name('model.show');
});

Route::get('/test', function () {

    return view('test');
});


use App\Http\Controllers\FormController;

Route::post('/submit', [FacultyController::class, 'show'])->name('submit');

require __DIR__ . '/auth.php';
