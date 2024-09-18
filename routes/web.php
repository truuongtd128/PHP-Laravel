<?php

use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductHomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('homepro');
});

// Route::get('/admin', function () {
//     return view('admins.categories.index');
// });
// Route::get('/dashboard', function () {
//     return view('admins.dashbord');
// })->middleware('auth');


Route::get('auth/showLogin', [LoginController::class, 'showFormLogin'])->name('showLogin');
Route::post('auth/login', [LoginController::class, 'login'])->name('login');

Route::get('auth/register', [RegisterController::class, 'showFormRegister'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);
Route::post('auth/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/', [ProductHomeController::class, 'productHome'])->name('home');
Route::get('/product/detail/{id}',[ProductHomeController::class,'detailProdcut'])->name('products.detail');
Route::get('/list-cart',[CartController::class,'listCart'])->name('cart.list');
Route::post('/add-to-cart',[CartController::class,'addCart'])->name('cart.add');
Route::post('/update-to-cart',[CartController::class,'updateCart'])->name('cart.update');


Route::middleware('auth')->prefix('orders')
->as('orders.')
->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
    Route::get('/show/{id}', [OrderController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [OrderController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [OrderController::class, 'destroy'])->name('destroy');
  
   
});

Route::middleware(['auth', 'auth.admin'])->prefix('admins')
    ->as('admins.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admins.dashbord');
        })->name('dashboard');

        Route::prefix('categories')
            ->as('categories.')
            ->group(function () {
                Route::get('/', [categoryController::class, 'index'])->name('index');
                Route::get('/create', [categoryController::class, 'create'])->name('create');
                Route::post('/store', [CategoryController::class, 'store'])->name('store');
                Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
              
               
            });

        
            Route::prefix('products')
            ->as('products.')
            ->group(function () {
                Route::get('/', [productController::class, 'index'])->name('index');
                Route::get('/create', [productController::class, 'create'])->name('create');
                Route::post('/store', [productController::class, 'store'])->name('store');
                Route::get('/show/{id}', [productController::class, 'show'])->name('show');
                Route::get('/edit/{id}', [productController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [productController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [productController::class, 'destroy'])->name('destroy');
              
               
            });

            Route::prefix('users')
            ->as('users.')
            ->group(function () {
                Route::get('/', [userController::class, 'index'])->name('index');
                Route::get('/create', [userController::class, 'create'])->name('create');
                Route::post('/store', [userController::class, 'store'])->name('store');
                Route::get('/show/{id}', [userController::class, 'show'])->name('show');
                Route::get('/edit/{id}', [userController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [userController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [userController::class, 'destroy'])->name('destroy');
              
               
            });


            Route::prefix('orders')
            ->as('orders.')
            ->group(function () {
                Route::get('/', [OrdersController::class, 'index'])->name('index');
                Route::post('/store', [OrdersController::class, 'store'])->name('store');
                Route::get('/show/{id}', [OrdersController::class, 'show'])->name('show');
                Route::get('/edit/{id}', [OrdersController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [OrdersController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [OrdersController::class, 'destroy'])->name('destroy');
              
               
            });
    });
