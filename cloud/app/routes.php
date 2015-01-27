<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

//Users views
Route::controller('users', 'UsersController');
Route::get('inscription', array('uses' => 'UsersController@getRegister', 'as' => 'inscription'));
Route::get('login', array('uses' => 'UsersController@getLogin', 'as' => 'login'));

//Upload Views
Route::get('upload', array('uses' => 'UploadsController@index', 'as' => 'upload'));
Route::post('upload', 'UploadsController@upload');
Route::get('myuploads', array('before' => 'auth', function()
{
    $userid = Auth::user()->id;
    $upload = Upload::where('user_id', '=', $userid)->orderBy('id', 'DESC')->paginate(5);
    return View::make('upload.myupload')->with('upload', $upload);
}));
Route::get('cloud', array('before' => 'auth', function()
{
    $userid = Auth::user()->id;
    $upload = Upload::where('status', '=', '1')->orderBy('id', 'DESC')->paginate(5);
    return View::make('upload.cloud')->with('upload', $upload);
}));

//Upload Actions
Route::group(['before' => 'auth'], function(){
    $id = '[0-9]+';
    Route::get('/', array('uses' => 'UploadsController@index', 'as' => 'basic'));
    Route::get('rename/{id}', array('uses' => 'UploadsController@getRename', 'as' => 'rename'))->where('id', $id);
    Route::post('rename/{id}', 'UploadsController@postRename')->where('id', $id);
    Route::get('delete/{id}', 'UploadsController@getDelete')->where('id', $id);
    Route::get('download/{id}', 'UploadsController@download')->where('id', $id);
    Route::get('share/{id}', array('uses' => 'UploadsController@getShare', 'as' => 'share'))->where('id', $id);
    Route::post('share/{id}', 'UploadsController@postShare')->where('id', $id);
});

//Admin views
Route::get('admin', array('before' => 'auth', function()
{
    $users = DB::table('users')->orderBy('id', 'DESC')->take(10)->skip(0)->get();
    $uploads = DB::table('files')->orderBy('id', 'DESC')->take(10)->skip(0)->get();
    if(Auth::user()->role_id == 2)
        return View::make('admin.recap')->with('users', $users)->with('uploads', $uploads);
    else
        return Redirect::to('/')->with('message', 'Vous n\'avez pas accez à cette partie du site');
}));

Route::get('admin/users', array('before' => 'auth', function()
{
    $users = DB::table('users')->orderBy('id', 'DESC')->paginate(10);
    if(Auth::user()->role_id == 2)
        return View::make('admin.users')->with('users', $users);
    else
        return Redirect::to('/')->with('message', 'Vous n\'avez pas accez à cette partie du site');
}));

Route::get('admin/files', array('before' => 'auth', function()
{
    $uploads = DB::table('files')->orderBy('id', 'DESC')->paginate(10);
    if(Auth::user()->role_id == 2)
        return View::make('admin.files')->with('uploads', $uploads);
    else
        return Redirect::to('/')->with('message', 'Vous n\'avez pas accez à cette partie du site');
}));

Route::get('admin/{user}', array('before' => 'auth', function()
{
    $username = '[a-zA-Z0-9]+';
    $userid = Auth::user()->id;
    if(Auth::user()->role_id == 2){
            $uploads = Upload::where('user_id', '=', $userid)->orderBy('id', 'DESC')->paginate(5);
            return View::make('admin.fileuser')->with('uploads', $uploads);
    }else{
        return Redirect::to('/')->with('message', 'Vous n\'avez pas accez à cette partie du site');
    }
}));

Route::group(['before' => 'auth'], function(){
    $id = '[0-9]+';
    Route::get('blok/{id}', array('uses' => 'AdminController@getBloked', 'as' => 'share'))->where('id', $id);
    Route::post('blok/{id}', 'AdminController@postBloked')->where('id', $id);
});