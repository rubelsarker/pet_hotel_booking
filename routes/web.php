<?php

use Illuminate\Support\Facades\Route;

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
    $rooms = \App\Model\Room::orderBy('id','desc')->take(4)->get();
    return view('welcome',compact('rooms'));
});

Auth::routes(['verify' => true]);
//password change
Route::get('password-change','Auth\ChangedPasswordController@edit')->name('password.edit')->middleware('verified');
Route::put('password-change','Auth\ChangedPasswordController@updatepassword')->name('manual.password.update')->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::group(['middleware' => ['auth','role:Admin','verified']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('room-category','CategoryController')->except('destroy');
    Route::get('room-category/{id}/delete','CategoryController@destroy')->name('room-category.destroy');
    Route::resource('room-facility','FacilityController')->except('destroy');
    Route::get('room-facility/{id}/delete','FacilityController@destroy')->name('room-facility.destroy');
    Route::resource('room','RoomController')->except('destroy');
    Route::get('room/{id}/delete','RoomController@destroy')->name('room.destroy');
    Route::get('all/booking-report','RoomBookingController@allBooking')->name('booking.report');
    Route::resource('task','TaskController')->except('destroy');
    Route::get('task/{id}/delete','TaskController@destroy')->name('task.destroy');
    Route::resource('assign-employee','EmployeeTaskController')->except('destroy');
    Route::get('assign-employee/{id}/delete','EmployeeTaskController@destroy')->name('assign-employee.destroy');
    Route::get('task-report','TaskCompleteController@allReport')->name('task-report');

});
Route::get('contact','FrontendController@contact')->name('contact');
Route::get('about','FrontendController@about')->name('about');
Route::get('room-list','FrontendController@roomList')->name('room.list');
Route::get('room-details/{id}','FrontendController@roomDetails')->name('room-details');
Route::group(['middleware' => ['auth','verified']], function() {
    Route::resource('room-booking','RoomBookingController')->except(['destroy','create']);
    Route::get('add/room-booking/{id}','RoomBookingController@createBooking')->name('add.booking');
    Route::post('payment','RoomBookingController@payment')->name('make.payment');
    Route::get('room-booking/{id}/delete','RoomBookingController@destroy')->name('room-booking.destroy');
});
Route::get('search-room','FrontendController@searchRoom')->name('search.room');

Route::group(['middleware' => ['auth','role:Employee','verified']], function() {
    Route::get('task-complete','TaskCompleteController@index')->name('task-complete.index');
    Route::get('task-complete/done/{id}','TaskCompleteController@Update')->name('task-complete.done');
});

