<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::group(['middleware' => ['cekUserLogin:admin']], function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('master/admin', 'master_admin_index');
        Route::post('master/admin', 'master_admin_store')->name('master.admin.store');
    });
});