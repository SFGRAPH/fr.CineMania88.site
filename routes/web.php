<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ForgotPasswordController as AdminForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController as AdminResetPasswordController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\SagaController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ReturnController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\PublicLoginController;
use App\Http\Controllers\Auth\PublicRegisterController;
use App\Http\Controllers\Auth\PublicLogoutController;

// Routes pour l'interface utilisateur
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{category}', [CategoriesController::class, 'show'])->name('categories.show');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/payment/{paymentLink}', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/account', [HomeController::class, 'account'])->name('account');
});

Route::get('login', [PublicLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [PublicLoginController::class, 'login']);
Route::post('logout', [PublicLogoutController::class, 'logout'])->name('user.logout');
Route::get('register', [PublicRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [PublicRegisterController::class, 'register']);

// Routes pour les administrateurs
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminLoginController::class, 'login']);
        Route::get('password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('password/reset', [AdminResetPasswordController::class, 'reset'])->name('password.update');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('genres', GenreController::class);
        Route::resource('actors', ActorController::class);
        Route::resource('directors', DirectorController::class);
        Route::resource('sagas', SagaController::class);
        Route::resource('events', EventController::class);
        Route::get('archived-orders', [OrderController::class, 'archivedOrders'])->name('archived-orders.index');
        Route::get('archived-orders/{archivedOrder}', [OrderController::class, 'showArchivedOrder'])->name('archived-orders.show');

        Route::middleware(['checksuperadmin'])->group(function () {
            Route::get('create', [AdminController::class, 'create'])->name('create');
            Route::post('store', [AdminController::class, 'store'])->name('store');
        });

        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/search', [OrderController::class, 'search'])->name('search');        
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/{order}', [OrderController::class, 'show'])->name('show');
            Route::patch('/{order}', [OrderController::class, 'update'])->name('update');
            Route::patch('/{order}/status', [OrderController::class, 'updateStatus'])->name('updateStatus');
            Route::post('/{order}/cancel', [OrderController::class, 'cancelOrder'])->name('cancelOrder');
            Route::get('/archived', [OrderController::class, 'archived'])->name('archived');
            Route::patch('/set-processing/{order}', [OrderController::class, 'setProcessing'])->name('setProcessing');
            Route::patch('/set-shipped/{order}', [OrderController::class, 'setShipped'])->name('setShipped');
            Route::patch('/set-completed/{order}', [OrderController::class, 'setCompleted'])->name('setCompleted');
            Route::patch('/set-cancelled/{order}', [OrderController::class, 'setCancelled'])->name('setCancelled');
            Route::post('/{order}/send-processing-email', [OrderController::class, 'sendProcessingEmail'])->name('sendProcessingEmail');
            Route::post('/{order}/send-shipped-email', [OrderController::class, 'sendShippedEmail'])->name('sendShippedEmail');
            Route::post('/{order}/send-completed-email', [OrderController::class, 'sendCompletedEmail'])->name('sendCompletedEmail');
            Route::post('/{order}/send-cancelled-email', [OrderController::class, 'sendCancelledEmail'])->name('sendCancelledEmail');
            Route::get('/{order}/products', [OrderController::class, 'getProducts']);
            Route::get('/{orderId}/products', [OrderController::class, 'getOrderProducts']);
        });

        Route::prefix('returns')->name('returns.')->group(function () {
            Route::get('/', [ReturnController::class, 'index'])->name('index');
            Route::get('/archived', [ReturnController::class, 'archived'])->name('archived');
            Route::get('/create', [ReturnController::class, 'create'])->name('create');
            Route::post('/', [ReturnController::class, 'store'])->name('store');
            Route::get('/{return}/edit', [ReturnController::class, 'edit'])->name('edit');
            Route::put('/{return}', [ReturnController::class, 'update'])->name('update');
            Route::delete('/{return}', [ReturnController::class, 'destroy'])->name('destroy');
            Route::post('/{return}/approve', [ReturnController::class, 'approve'])->name('approve');
            Route::post('/{return}/reject', [ReturnController::class, 'reject'])->name('reject');
            Route::post('/{return}/refund', [ReturnController::class, 'refund'])->name('refund');
            Route::get('/{return}', [ReturnController::class, 'show'])->name('show');
        });
    });
});

// Routes pour les utilisateurs normaux
Route::middleware('auth:web')->group(function () {
    Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});


// Route de test pour l'envoi d'email
Route::get('/test-email', function () {
    $order = App\Models\Order::find(1); 
    Mail::to('sf.graph@outlook.com')->send(new App\Mail\OrderProcessing($order));
    dd('Email sent');
});

// Routes pour la vérification par Jetstream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});














