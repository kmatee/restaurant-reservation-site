<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\CartController;

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

Route::get('/',[WelcomeController::class, 'index'])->name('home');

Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');

Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');

Route::get('/reservations/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservations/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservations/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservations/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');

Route::post('/cart',[CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/increase/{id}', [CartController::class, 'increaseQty'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [CartController::class, 'decreaseQty'])->name('cart.decrease');

Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');
Route::post('/order-confirm', [OrderController::class, 'processOrder'])->name('order-confirm');
Route::post('/checkout-confirm', [CheckoutController::class, 'store'])->name('checkout-confirm');
Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');

Route::get('/thankyou-order', [CheckoutController::class, 'index'])->name('thankyou-order');

Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');

Route::get('/contact', [FooterController::class, 'contact'])->name('contact');
Route::post('/contact', [FooterController::class, 'contactEmail'])->name('contact-email');

Route::get('/about', [FooterController::class, 'about'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
    Route::resource('/orders', \App\Http\Controllers\Admin\OrderController::class);
    Route::get('/items{order}', [ItemsController::class, 'index'])->name('items.index');
    Route::get('/item/{orderId}/{itemId}/edit', [ItemsController::class, 'edit'])->name('items.edit');
    Route::get('/item/{orderId}/{itemId}/update', [ItemsController::class, 'update'])->name('items.update');
    Route::delete('/item/{orderId}/{itemId}/delete', [ItemsController::class, 'destroy'])->name('items.delete');

});

require __DIR__.'/auth.php';
