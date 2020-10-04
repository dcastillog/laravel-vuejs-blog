<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\PostController;
// use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Admin\UserRoleController;
// use App\Http\Controllers\Admin\UserPermissionController;
// use App\Http\Controllers\Admin\RoleController;
// use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\PagesController;



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

Auth::routes(['register' => false]);

// Route::get('/','PagesController@index')->name('pages.home');
// Route::get('/blog/{post}','PostController@show')->name('posts.show');





// Admin routes
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'], function(){
        
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class, ['except' => 'show', 'as' => 'admin']);
    Route::resource('users', UserController::class, ['as' => 'admin']);
    Route::resource('roles', RoleController::class, ['as' => 'admin']);
    Route::resource('permissions', PermissionController::class, ['only' => ['index','edit','update'],'as' => 'admin']);
    
    Route::middleware('role:Admin') // El middleware role evitará que un usuario se cambie su rol y permisos de usuario, solo el Admin podrá hacerlo
        ->put('users/{user}/roles',[UserRoleController::class, 'update'])->name('admin.users.roles.update');
    
    Route::middleware('role:Admin')
        ->put('users/{user}/permissions',[UserPermissionController::class, 'update'])->name('admin.users.permissions.update');
        
    Route::post('/posts/{post}/photos',[PhotoController::class, 'store'])->name('admin.posts.photos.store');
    Route::delete('/photos/{photo}',[PhotoController::class, 'destroy'])->name('admin.photos.destroy');
});


/**
 * {any} admite cualquier parámetro y asi accede a SPA, con ? se hace opcional 
 * Lo ideal es colocar una ruta con metodo any al final, para que no interfiera con las demás rutas
 * where any sea igual (.*) cualquier caracter (.) y la cantidad que sea de los mismos (*)
 */

Route::get('/{any?}',[PagesController::class, 'spa'])->name('pages.spa')->where('any','.*'); 

