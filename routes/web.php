<?php


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Livewire\showInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {

    Route::get('/dashboard/index', function () {
        return view('dashboard-adminlte.index');
    })->name('dashboard.index');
    Route::controller(UserController::class)->prefix('User')->as('user.')->group(function () {
        Route::get("/index", 'index')->name('index');
        Route::post("/Store", 'store')->name('store');
        Route::put("/update/{id}", 'update')->name('update');
        Route::DELETE("/delete/{id}", 'destroy')->name('destroy');
    });

    Route::controller(\App\Http\Controllers\PanelController::class)->prefix('panels')->as('panels.')->group(function () {
        Route::get("/index", 'index')->name('index');
        Route::post("/store", 'store')->name('store');
        Route::put("/update/{id}", 'update')->name('update');
        Route::get("/show/{id}", 'show')->name('show');
        Route::delete("/delete/{id}", 'delete')->name('delete');
    });

    Route::controller(\App\Http\Controllers\DepartmentController::class)->prefix('department')->as('department.')->group(function () {
        Route::get("/index", 'index')->name('index');
        Route::post("/Store", 'store')->name('store');
        Route::put("/update/{id}", 'update')->name('update');
        Route::DELETE("/delete/{id}", 'delete')->name('delete');
    });

    Route::controller(\App\Http\Controllers\OperationController::class)->prefix('operation')->as('operation.')->group(function () {
        Route::get("/index", 'index')->name('index');
        Route::post("/Store", 'store')->name('store');
        Route::put("/update/{id}", 'update')->name('update');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });

    Route::controller(RoleController::class)->prefix('role')->as('role.')->group(function () {
        Route::get("/index", 'index')->name('index');
        Route::post("/store", 'store')->name('store');
        Route::put("/update/{id}", 'update')->name('update');
        Route::delete("/delete/{id}", 'delete')->name('delete');
    });

    Route::controller(\App\Http\Controllers\PermissionController::class)->prefix('permission')->as('permission.')->group(function () {
        Route::get("/index", 'index')->name('index');
        Route::post("/store", 'store')->name('store');
        Route::put("/update/{id}", 'update')->name('update');
        Route::delete("/delete/{id}", 'delete')->name('delete');
    });
    Route::get("/input", \App\Livewire\Input\Input::class)->name('input.show');


    Route::get("/jobs", \App\Livewire\RunningActionJobs::class)->name('jobs');

    Route::get("/failed_jobs", \App\Livewire\RunningFailedJobs::class)->name('failed_jobs');

    Route::controller(\App\Http\Controllers\BackupController::class)->prefix('Backup')->as('backup.')->group(function () {
        Route::get("/create", 'create')->name('create');
        Route::get("/index", 'index')->name('index');
        Route::get("/download/{file_name}", 'download')->name('download');
        Route::get("/delete/{file_name}'", 'delete')->name('delete');
    });

    Route::get("/logs", [\App\Http\Controllers\LogController::class,'index'])->name('log.index');

});



