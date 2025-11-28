<?php

// imports
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ReportsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

//web page
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
// end of web page



//login page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/store_user', [App\Http\Controllers\UserController::class, 'store'])->name('store_user');
Route::get('/edit_user', [App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
Route::put('/update_user', [App\Http\Controllers\UserController::class, 'update'])->name('update_user');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::put('/update_profile', [App\Http\Controllers\UserController::class, 'update_profile'])->name('update_profile');
Route::delete('/delete_user', [App\Http\Controllers\UserController::class, 'delete'])->name('delete_user');
Route::put('/toggle_user_status', [App\Http\Controllers\UserController::class, 'toggleActive'])->name('toggle_user_status');
// end of login page


// auth routes
// -----------
//client
Route::get('/menu_create', [App\Http\Controllers\MenuController::class, 'index'])->name('client');
Route::post('/menu_create', [App\Http\Controllers\MenuController::class, 'store'])->name('store');
Route::post('/menu', [App\Http\Controllers\MenuController::class, 'store'])->name('menu_store');
Route::get('/menuedit-{id}', [App\Http\Controllers\MenuController::class, 'menuedit'])->name('menuedit');
Route::put('/menuedit-{id}', [App\Http\Controllers\MenuController::class, 'menu_update'])->name('menu_update');
Route::delete('/menu/delete', [App\Http\Controllers\MenuController::class, 'delete'])->name('delete_menu');
// Route::resource('/client',App\Http\Controllers\MenuController::class);

//department
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('departmebt');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'categorystore'])->name('categorystore');





//promotions
Route::get('/promotion', [PromotionsController::class, 'index'])->name('index');
Route::get('/promotion/create', [PromotionsController::class, 'create'])->name('create');
Route::post('/promotion/store', [PromotionsController::class, 'store'])->name('store');
Route::get('/promotion/{id}', [PromotionsController::class, 'show'])->name('show');
Route::get('promotion/edit/{id}', [PromotionsController::class, 'edit'])->name('edit');
Route::put('promotion/update/{id}', [PromotionsController::class, 'update'])->name('update');
Route::delete('promotion/delete/{id}', [PromotionsController::class, 'destroy'])->name('destroy');


// food order
Route::get('/food_order', [OrderController::class, 'foodOrder'])->name('food_order');
Route::get('/checkout', [OrderController::class, 'checkOut'])->name('checkout');
Route::get('add_to_cart/{id} ', [OrderController::class, 'addToCart'])->name('add_to_cart');

Route::get('/remove_from_cart/{id}', [OrderController::class, 'removeFromCart'])->name('remove_from_cart');
// end of food order

//menu
Route::get('/menu_create', [App\Http\Controllers\MenuController::class, 'index'])->name('menu_create');
Route::post('/menu', [App\Http\Controllers\MenuController::class, 'store'])->name('menu_store');
Route::get('/menuedit-{id}', [App\Http\Controllers\MenuController::class, 'menuedit'])->name('menuedit');
Route::put('/menuedit-{id}', [App\Http\Controllers\MenuController::class, 'menu_update'])->name('menu_update');
Route::delete('/menu/delete', [App\Http\Controllers\MenuController::class, 'delete'])->name('delete_menu');
// Route::resource('/client',App\Http\Controllers\MenuController::class);


// login

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);//admin login

Route::get('/clogin', [AuthController::class, 'Clogin'])->name('clogin');// customer login 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');// customer logout 
Route::post('/customerLogin', [AuthController::class, 'customerLogin'])->name('customerLogin');//customerLogin
Route::get('/userProfile', [AuthController::class, 'userProfile'])->name('userProfile');//customer profile
Route::get('/userReg', [AuthController::class, 'userReg'])->name('userReg');// customer register view
Route::post('/createUser', [AuthController::class, 'createUser'])->name('createUser');//custome add 






Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/adminlogout', [AdminController::class, 'adminLogout'])->name('adminlogout');// admin logout

Route::get('/addUser', [AdminController::class, 'addUser'])->name('addUser');


Route::post('/regUser', [App\Http\Controllers\RegisterUserController::class, 'addUser'])->name('regUser');//register user

Route::post('/category_create', [App\Http\Controllers\MenuController::class, 'createCategory'])->name('category_create'); //category create
Route::delete('/userDelete', [App\Http\Controllers\RegisterUserController::class, 'deleteUser'])->name('userDelete');



Route::get('/reports', [App\Http\Controllers\ReportsController::class, 'index'])->name('reports');// reports

Route::post('/storeSales', [App\Http\Controllers\OrderController::class, 'storeSales'])->name('storeSales'); //store sales




Route::post('/sales/update-status/{id}', [ReportsController::class, 'updateStatus'])->name('updateStatus');

// Route to handle adding item to the cart
Route::post('/add_to_cart/{id}', [OrderController::class, 'addToCart'])->name('add_to_cart');


