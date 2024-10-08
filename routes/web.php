<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\login;
use App\Http\Controllers\admin\user;
use App\Http\Controllers\admin\product;
use App\Http\Controllers\admin\rates;
use App\Http\Controllers\admin\feedback;
use App\Http\Controllers\allproduct;
use App\Http\Controllers\cart;
use App\Http\Controllers\checkout;





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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [allproduct::class, 'related'])->name('/homepage');
Route::get('/search' , [allproduct::class , 'product'])->name('/search');

Route::get('/aboutus', function (){
    return view('aboutus');
})->name('/aboutus');

Route::get('/allproduct', [allproduct::class, 'product'])->name('/allproduct');

Route::get('/productCard', function(){
    return view('productCard');
});

Route::get('/contact', function(){
    return view('contact');
})->name('/contact');

Route::get('/login', [allproduct::class, 'vlogin'])->name('/viewlogin');
Route::post('/login', [allproduct::class, 'userlogin'])->name('/userlogin');
Route::post('/logout', [allproduct::class, 'userlogout'])->name('/logout');
Route::get('/change-info', [allproduct::class, 'vchange'])->name('/viewchange');
Route::post('/change-info', [allproduct::class, 'updateinfo'])->name('/updateinfo');

Route::get('/register', [allproduct::class, 'vregister'])->name('/viewregister');
Route::post('/register', [allproduct::class, 'userregister'])->name('/userregister');

Route::get('/profile-user', [allproduct::class, 'profile'])->middleware('user')->name('/profile-user');

Route::get('/product/{id}', [allproduct::class, 'show']);

Route::post('/review', [allproduct::class, 'addreview'])->middleware('user')->name('/add_review');

Route::post('/feedback', [allproduct::class, 'addfeedback'])->middleware('user')->name('/feedback');

Route::get('/collection', function(){
    return view('collection');
})->name('/collection');

Route::get('/payments', function(){
    return view('payments');
})->middleware('user')->name('/payments');

//Cart
Route::get('/cart', [cart::class, 'index'])->name('cart');
Route::post('/cart/add/{product}', [cart::class, 'add'])->name('cart.add');
Route::post('/cart/update/{product_id}', [cart::class, 'update'])->name('cart.update');
Route::post('/cart/delete/{product_id}', [cart::class, 'delete'])->name('cart.delete');

//Checkout
Route::post('/checkout', [checkout::class, 'checkOut'])->middleware('user')->name('checkout');
Route::get('/checkout/vnPayCheck', [checkout::class, 'vnPayCheck'])->middleware('user')->name('checkout.vnpay');

//admin login
Route::get('/admin/login', [login::class, 'login'])->name('/admin/login');
Route::post('/admin/login', [login::class, 'adminLogin'])->name('/admin/checklogin');
//admin logout
Route::get('/admin/logout', [login::class, 'adminLogout'])->name('/admin/logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/prod', [product::class, 'product'])->name('/admin/prod');
    Route::get('/admin/user', [user::class, 'user'])->name('/admin/user');
    Route::get('/admin/customer', [user::class, 'customer'])->name('/admin/customer');

    Route::get('/admin/order', [product::class, 'order'])->name('/admin/order');
    Route::get('/admin/dashboard', [product::class, 'dashboard'])->name('/admin/dashboard');


    Route::get('/vaddprod', [product::class, 'vaddprod'])->name('/vaddprod');
    Route::post('/addprod', [product::class, 'addprod'])->name('/addprod');
    Route::DELETE('/delete/{id}', [product::class, 'delete']);
    Route::get('/edit/{id}', [product::class, 'edit'])->middleware('level');
    Route::PATCH('/update/{id}', [product::class, 'update']);

    Route::DELETE('/admin/order/delete/{id}', [product::class, 'deleteOD']);
   
    Route::DELETE('/admin/customer/delete/{id}', [user::class, 'deleteCM'])->middleware('level');

    Route::DELETE('/admin/delete/{id}', [user::class, 'delete'])->middleware('level');
    Route::get('/admin/edit/{id}', [user::class, 'edit'])->middleware('level');
    Route::PATCH('/admin/update/{id}', [user::class, 'update']);
    Route::get('/vadduser', [user::class, 'vadduser'])->name('/vadduser')->middleware('level');
    Route::post('/adduser', [user::class, 'adduser'])->name('/adduser');

    Route::DELETE('/admin/feeback/delete/{id}', [rates::class, 'deleteFB']);
    Route::DELETE('/admin/review/delete/{id}', [rates::class, 'deleteRV']);

    Route::get('/admin/review', [rates::class, 'review'])->name('/admin/review');
    Route::get('/admin/feedback', [rates::class, 'feedback'])->name('/admin/feedback');

    Route::get('/admin/detail/{id}', [product::class, 'detail']);
    Route::post('/admin/browser/{id}', [product::class, 'browser']);

    Route::get('/admin/error', [product::class, 'error'])->name('/admin/error');
    
});

