<?php



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

Route::get('/', 'WelcomeController@index')->name('firstSide');



Auth::routes();

Route::get('/auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('/auth/activate/resend', 'Auth\ResendActivationController@showResendForm')->name('auth.activate.resend');
Route::post('/auth/activate/resend', 'Auth\ResendActivationController@reSend');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'User\ProfileController@index')->name('profile');
    Route::post('/profile/update/profile', 'User\ProfileController@updatePassword')->name('profile.update.password');
    Route::get('/logout', 'User\ProfileController@logout');
    Route::post('/book', 'Book\BookController@create')->name('book');
    Route::get('/book/delete', 'Book\BookController@delete')->name('book.delete');
    Route::get('/book/verf', 'Book\BookController@verf')->name('book.verf');
    Route::get('/book/verf/resend', 'Book\BookController@resendVerfMail')->name('book.verf.resend');
});

Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => ['admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::get('/books', 'AdminBookController@index')->name('admin.books');
    Route::get('/books/delete', 'AdminBookController@delete')->name('admin.books.delete');

    Route::get('/users', 'AdminUserController@index')->name('admin.users');
    Route::get('/users/delete', 'AdminUserController@delete')->name('admin.users.delete');
    Route::get('/users/edit', 'AdminUserController@edit')->name('admin.users.edit');
    Route::post('/users/update', 'AdminUserController@update')->name('admin.users.update');
});
