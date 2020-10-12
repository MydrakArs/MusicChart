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

Route::get('/', function () {
    return view('StartPage.welcome');
});

// Route::get('/registration', function () {
//     return view('StartPage.registration');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home/send-massage', 'StartController@sendMessage');
// Route::get('/music', 'MusicController@index');

Route::get('/music/artists', function() {
    return view('artists');
});

Route::post('/music', 'ArtistsController@get');
Route::post('/music/alb', 'AlbumsController@get');
Route::post('/music/artists', 'ArtistsController@get');
Route::get('/check', 'UserController@userOnlineStatus');

Route::get('/profile', function() {
    return view('profile');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{id}', [
        'uses' => 'ProfileController@index',
        'as' => 'profile'
    ]);

    Route::get('/profile/edit/profile', [
        'uses' => 'ProfileController@edit',
        'as' => 'profile.edit'
    ]);

    Route::post('/profile/update/profile', [
        'uses' => 'ProfileController@update',
        'as' => 'profile.update'
    ]);

    Route::get('/profile/add/profile', [
        'uses' => 'ProfileController@edit_album',
        'as' => 'profile.add'
    ]);

    Route::post('/profile/add_album/profile', [
        'uses' => 'ProfileController@add_album',
        'as' => 'profile.add_album'
    ]);

    Route::get('/profile/song/profile', [
        'uses' => 'ProfileController@edit_song',
        'as' => 'profile.addsong'
    ]);

    Route::post('/profile/add_song/profile', [
        'uses' => 'ProfileController@add_song',
        'as' => 'profile.add_song'
    ]);

    Route::get('/check_relationship_status/{id}', [
        'uses' => 'FriendshipsController@check',
        'as' => 'check'
    ]);

    Route::get('/add_friend/{id}', [
        'uses' => 'FriendshipsController@add_friend',
        'as' => 'add_friend'
    ]);

    Route::get('/accept_friend/{id}', [
        'uses' => 'FriendshipsController@accept_friend',
        'as' => 'accept_friend'
    ]);
    
    Route::get('get_unread', function(){
        return Auth::user()->unreadNotifications;
    });

    Route::get('/notifications', [
        'uses' => 'HomeController@notifications',
        'as' => 'notifications'
    ]);
    Route::get('/music', [
        'uses' => 'MusicController@index',
        'as' => 'music'
    ]);
    Route::get('/album/{id}', [
        'uses' => 'AlbumsController@index',
        'as' => 'album'
    ]);
    Route::get('/artist/{id}', [
        'uses' => 'ArtistsController@index',
        'as' => 'artist'
    ]);
    Route::get('/friends/{id}', [
        'uses' => 'FriendshipsController@index',
        'as' => 'friends'
    ]);
    Route::get('/music/add_song/{id}', [
        'uses' => 'MusicController@add',
        'as' => 'add_song'
    ]);
    Route::get('/music/audios/{id}', [
        'uses' => 'MusicController@userMusic',
        'as' => 'audios'
    ]);
});

Route::get('/settings', function() {
    return view('settings');
});
// Route::get('/friends', function() {
//     return view('friends');
// });

Route::post('ulogin', 'UloginController@login');
Route::post('/images-upload', 'ImagesController@upload');

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');

Route::post('/conversation/send', 'ContactsController@send');