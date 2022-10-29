<?php


use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
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

// wellcome page
Route::get('/', function () {
    return view('welcome');
});

// User Register
Route::get("/register",[UserController::class,"register"]);
Route::post("/users",[UserController::class,"store"]);

//login
Route::get("/login",[UserController::class,"login"]);
Route::post("/users/authenticate",[UserController::class,"authenticate"]);

//admin view
Route::get("/admin",[UserController::class,"viewUsers"]);

// update user is_approved colum
Route::put("/users/{user}",[UserController::class,"update"]);

// DELETE USER
Route::delete("/users/{user}",[UserController::class,"delete"]);

// logout user
Route::post("/logout",[UserController::class,"logout"]);

// edit photo
Route::put("/upload/{user}",[UserController::class,"upload"]);


// view form for reseting password
Route::get('/forgot-password', function () {
    return view('users.passwordresetform');
})->middleware('guest')->name('password.request');


// sending email via reset link
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

// view reseting password form 
Route::get('/reset-password/{token}', function ($token) {
    return view('users.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// updating password
Route::post('/reset-password', function (Request $request) {
    // dd($request);
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
