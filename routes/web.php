<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DailyUpdateController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Routes for SUPERADMIN for DASHBOARD
Route::middleware(['auth', 'role:superadmin'])->name('dashboard.')->prefix('dashboard')->group(function () {
    //Routes for Roles & PERMISSIONS Display|ADD|EDIT|DELETE
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

    //Routes for USERS
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); //Display users
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show'); //Display roles n permissions of user
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); //Delete User
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles'); //Assign ROle to user
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove'); //Remove role of user
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions'); //Give permission to user
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke'); //Revoke Permission from user
});

//Routes for ADMIN / SUPERADMIN for DASHBOARD
Route::middleware(['auth', 'role:admin|superadmin'])->name('dashboard.')->prefix('dashboard')->group(function () {
    //Check Daily Updates
    Route::get('/daily-updates/check', [DailyUpdateController::class, 'check_index'])->name('daily-updates.check-index');
    Route::get('/daily-updates/check/{user}/show', [DailyUpdateController::class, 'check_show'])->name('daily-updates.check-show');
    Route::get('/daily-updates/check/{dailyUpdate}/verify', [DailyUpdateController::class, 'check_verify'])->name('daily-updates.check-verify');
    Route::put('/daily-updates/check/{dailyUpdate}/verify/update', [DailyUpdateController::class, 'check_update'])->name('daily-updates.check-update');
});

//Routes for USER / ADMIN / SUPERADMIN for DASHBOARD
Route::middleware(['auth', 'role:user|admin|superadmin'])->name('dashboard.')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    //Daily Updates
    Route::get('/daily-updates', [DailyUpdateController::class, 'index'])->name('daily-updates.index');
    Route::get('/daily-updates/create', [DailyUpdateController::class, 'create'])->name('daily-updates.create');
    Route::post('/daily-updates/store', [DailyUpdateController::class, 'store'])->name('daily-updates.store');
    Route::get('/daily-updates/{dailyUpdate}/edit', [DailyUpdateController::class, 'edit'])->name('daily-updates.edit');
    Route::put('/daily-updates/{dailyUpdate}/update', [DailyUpdateController::class, 'update'])->name('daily-updates.update');
    Route::get('/daily-updates/{dailyUpdate}/show', [DailyUpdateController::class, 'show'])->name('daily-updates.show');
    Route::delete('/daily-updates/{dailyUpdate}/destroy', [DailyUpdateController::class, 'destroy'])->name('daily-updates.destroy');

    // Category routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    // NOtes routes
    Route::get('/notes', [NotesController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NotesController::class, 'create'])->name('notes.create');
    Route::post('/notes/store', [NotesController::class, 'store'])->name('notes.store');
    Route::get('/notes/{notes}/edit', [NotesController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{notes}/update', [NotesController::class, 'update'])->name('notes.update');
    Route::get('/notes/{notes}/show', [NotesController::class, 'show'])->name('notes.show');
    Route::delete('/notes/{notes}/destroy', [NotesController::class, 'destroy'])->name('notes.destroy');

    //Tags
    Route::get('/notes/{notes}/tags', [TagController::class, 'index'])->name('notes.tags.index');
    Route::post('/notes/{notes}/tags/store', [TagController::class, 'store'])->name('notes.tags.store');
    Route::delete('/notes/tags/{tag}/destroy', [TagController::class, 'destroy'])->name('notes.tags.destroy');

});


require __DIR__ . '/auth.php';
