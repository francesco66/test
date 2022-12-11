<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('home');
});

/*
Verb 	    URI 	                Action 	    Route Name

GET 	    /photos 	            index    	photos.index
GET 	    /photos/create 	        create   	photos.create
POST 	    /photos 	            store    	photos.store
GET 	    /photos/{photo}     	show 	    photos.show
GET 	    /photos/{photo}/edit 	edit 	    photos.edit
PUT/PATCH 	/photos/{photo} 	    update 	    photos.update
DELETE 	    /photos/{photo} 	    destroy 	photos.destroy
*/

// Posts
Route::resource('posts', PostController::class);

// Newsletter
Route::post('newsletter', NewsletterController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Login with Google
Route::get('/auth/google/login', [SocialLoginController::class, 'GoogleRedirect']);
Route::get('/auth/google/callback', [SocialLoginController::class, 'GoogleLogin']);

// Login with Facebook
Route::get('/auth/facebook/login', [SocialLoginController::class, 'FacebookRedirect']);
Route::get('/auth/facebook/callback', [SocialLoginController::class, 'FacebookLogin']);


require __DIR__.'/auth.php';
