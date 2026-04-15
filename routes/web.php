<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BladeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ValidationController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/posts', [PostController::class, 'index'])
//    ->name('posts.index');
//
//Route::get('/posts/{post}', [PostController::class, 'show'])
//    ->name('posts.show');
//
//Route::post('/orders', [OrderController::class, 'process'])
//    ->name('orders.process');
//
//Route::get('/adults', function() {
//    return response()->json([
//        'success' => true,
//        'message' => 'Welcome!!!'
//    ]);
//})->middleware('age:18')
//->name('adults.index');



// ====== path parameters
//Route::get('/users/{id}', function ($id) {
//    return "User $id";
//});
//
//Route::get('/users/{name?}', function ($name = 'Guest') {
//    return "Hello $name";
//});
//
//Route::get('/users/{id}', function ($id) {
//    return "User $id";
//})->where('id', '[0-9]+');
//

// Route::get('/posts/{post}/comments/{comment}', function($post, $comment) {});

//Route::get('/posts/{post}', function(Post $post) {
//});

//Route::get('/posts/{post:title}', function(Post $post) {
//});

//Route::get('/posts/{post?}', function(Post|null $post) {
//});

// Route::any('/posts'....);
// Route::redirect('/users', '/v2/users', 301);
// Route::view('/about', 'pages.about');




// ======= routes group
//Route::middleware(['auth', 'admin',])->group(function() {
//    Route::get('/users', ....);
//    Route::get('/posts', ....);
//});

//Route::prefix('api')->group(function() {
//    Route::get('/users', function() {});        // /api/users
//    Route::get('/posts', function() {});        // /api/posts
//});

//Route::name('admin.')->group(function() {
//    Route::get('/users', function() {})->name('users');        // 'admin.users'
//    Route::get('/posts', function() {})->name('posts');        // 'admin.posts'
//});

//Route::middleware(['auth', 'admin'])
//    ->prefix('admin')
//    ->name('admin.')
//    ->group(function() {
//        Route::get('/users', function () {})
//            ->name('users');                // /admin/users         admin.users
//    });

//Route::middleware(['throttle:api'])->group(function() {
//    Route::get('/users', ....);
//    Route::get('/posts', ....);
//});

//Route::middleware(['throttle:10,1'])->group(function() {
//    Route::get('/users', ....);
//    Route::get('/posts', ....);
//});

//Route::get('/admin/dashboard', function () {
//    return 'This is dashboard';
//})->middleware('can:access-admin-panel');
//
//Route::middleware('can:access-admin-panel')->group(function () {
//
//});




Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');


//Route::prefix('posts')
//    ->name('posts.')
//    ->group(function () {
//
//        Route::get('/', [PostController::class, 'index'])
//            ->middleware('throttle:std')
//            ->name('index');
//
//        Route::get('/{post}', [PostController::class, 'show'])
//            ->name('show');
//
//        Route::post('/', [PostController::class, 'store'])
//            ->name('store');
//
//    });


// ---------------
Route::prefix('views')
    ->name('views.')
    ->group(function () {
        Route::get('/directives', [BladeController::class, 'directives'])->name('directives');
        Route::get('/inheritance', [BladeController::class, 'inheritance'])->name('inheritance');
        Route::get('/deepinh', [BladeController::class, 'deepInheritance'])->name('deepInheritance');
        Route::get('/stack', [BladeController::class, 'stack'])->name('stack');
        Route::get('/components', [BladeController::class, 'components'])->name('components');
        Route::get('/slot', [BladeController::class, 'slot'])->name('slot');
    });
// -----------

Route::prefix('validation')
    ->name('validation.')
    ->group(function () {
        Route::post('/', [ValidationController::class, 'intro']);
    });


// ============ POSTS ==================

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')
    ->where('post', '[0-9]+');

Route::middleware('auth')
    ->prefix('posts')
    ->name('posts.')
    ->group(function () {
        Route::get('/create',       [PostController::class, 'create'])  ->name('create');
        Route::post('/',            [PostController::class, 'store'])   ->name('store');
        Route::get('/{post}/edit',  [PostController::class, 'edit'])    ->name('edit');
        Route::put('/{post}',       [PostController::class, 'update'])  ->name('update');
        Route::delete('/{post}',    [PostController::class, 'destroy']) ->name('destroy');
    });


Route::middleware('auth')
    ->prefix('comments')
    ->name('comments.')
    ->group(function () {
        Route::post('/posts/{post}', [CommentController::class, 'store'])->name('store');
        Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('destroy');
});

Route::get('/test', function() {})->middleware('can:view,App\Models\Post');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/test', [TagController::class, 'test']);
