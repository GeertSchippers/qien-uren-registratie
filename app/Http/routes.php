<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Use App\Hours_declaration;

Route::get('/', function () {
  return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index');

Route::get('/trainee', function () {
  return view('/trainee/index');
})->name('trainee');

Route::get('/hours_declarations/{id}', function($id){
    $declarations = App\Hours_declaration::where('user_id',$id)->get();
    return $declarations;
});

Route::get('/admin', 'UserController@index')->name('admin');
Route::get('/admin/trainee/{id}', 'UserController@show')->name('admin/trainee');

Route::get('/post', function(){
return view('trainee.post');
});

Route::resource('/declarations','DeclarationController');
Route::resource('/hours_declarations', 'Hours_declarationController');

Route::post('/companies', 'CompanyController@create');


Route::get('/formulier', function(){
   return view('trainee/formulier');
});
