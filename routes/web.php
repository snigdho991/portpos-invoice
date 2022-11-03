<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Ums\AdminToolsController;
use App\Http\Controllers\Cms\ThemeController;
use App\Http\Controllers\Ums\ProfileController;


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

Route::get('/register', function() {
    return redirect('/login');
});

Route::get('/', function() {
    return redirect('/login');
});

// Route::get('/generate-role', [RoleController::class, 'generate_role'])->name('generate.role');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::post('/save-theme', [ThemeController::class, 'select_theme'])->name('select.theme');

	Route::post('/save/basic-info', [ProfileController::class, 'save_basic_info'])->name('save.basic.info');
	Route::post('/save/change-password', [ProfileController::class, 'change_auth_password'])->name('change.auth.password');
		
	Route::group(['prefix' => 'administrator'], function(){
		Route::get('/dashboard', [AdminToolsController::class, 'dashboard'])->name('dashboard');
		Route::get('/all-orders', [AdminToolsController::class, 'all_orders'])->name('all.orders');
		Route::get('/create-order', [AdminToolsController::class, 'create_order'])->name('create.order');
		Route::post('/store-order', [AdminToolsController::class, 'store_order'])->name('store.order');
		Route::post('/update-status/{invoice_id}', [AdminToolsController::class, 'update_status'])->name('update.status');
		Route::post('/refund/order/{invoice}', [AdminToolsController::class, 'refund'])->name('refund');

		//Route::get('/invoice/{invoice_id}', [AdminToolsController::class, 'check_invoice'])->name('check.invoice');
	});

});
