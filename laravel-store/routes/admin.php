<?php
namespace App\Providers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\blogController;

//Route::prefix('admin')->group(function (){
	Route::resource('blog',blogController::class)->except('show');
//});