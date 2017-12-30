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
    Route::post('profile/update', 'User\ProfileController@update')->name('profile.update');
    Route::post('/profile/update/profile', 'User\ProfileController@updatePassword')->name('profile.update.password');
    Route::get('/logout', 'User\ProfileController@logout');
    Route::get('/profile/delete', 'User\ProfileController@delete')->name('profile.delete');
    Route::post('/book', 'Book\BookController@create')->name('book');
    Route::get('/book/delete', 'Book\BookController@delete')->name('book.delete');
    Route::get('/book/verf', 'Book\BookController@verf')->name('book.verf');
    Route::get('/book/verf/resend', 'Book\BookController@resendVerfMail')->name('book.verf.resend');
});

Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => ['admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::get('/books', 'AdminBookController@index')->name('admin.books');
    Route::get('/books/edit', 'AdminBookController@edit')->name('admin.books.edit');
    Route::get('/books/delete', 'AdminBookController@delete')->name('admin.books.delete');
    Route::post('/books/edit/changeplace', 'AdminBookController@changePlace')->name('admin.books.edit.changeplace');
    Route::get('/books/edit/verf', 'AdminBookController@verf')->name('admin.books.edit.verf');
    Route::get('/books/new', 'AdminBookController@addNewBook')->name('admin.books.new');
    Route::post('/books/new/save', 'AdminBookController@saveNewBook')->name('admin.books.new.save');
    Route::get('/books/paid', 'AdminBookController@setAsPaid')->name('admin.books.paid');

    Route::get('/books/checkin', 'AdminCheckinController@step1')->name('admin.books.checkin');
    Route::post('/books/checkin', 'AdminCheckinController@checkin')->name('admin.books.checkin');
    Route::post('/books/checkin/step2', 'AdminCheckinController@step2')->name('admin.books.checkin.step2');
    Route::get('/books/checkin/verify', 'AdminCheckinController@verify')->name('admin.books.checkin.verify');

    Route::get('/users', 'AdminUserController@index')->name('admin.users');
    Route::get('/users/delete', 'AdminUserController@delete')->name('admin.users.delete');
    Route::get('/users/edit', 'AdminUserController@edit')->name('admin.users.edit');
    Route::post('/users/update', 'AdminUserController@update')->name('admin.users.update');
    Route::get('/users/new', 'AdminUserController@addNewUser')->name('admin.users.new');
    Route::post('/users/new/save', 'AdminUserController@saveNewUser')->name('admin.users.new.save');

    Route::get('/users/admins', 'AdminController@showAdmins')->name('admin.users.admins');

});
