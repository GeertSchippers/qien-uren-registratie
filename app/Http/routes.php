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
use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;

// ---------------------- Custom Routes ------------------------

Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::get('/formulier', function(){
   return view('trainee/formulier')->with('user', Auth::user());
});

Route::get('/admin/trainee/{id}', 'UserController@show');

// -------------------- Resourced Routes ----------------------

Route::auth();

Route::resource('/trainees', 'TraineeController');

Route::resource('/admins', 'AdminController');


Route::resource('admins.trainees', 'AdminTraineeController');

Route::resource('/declarations','DeclarationController');


Route::resource('/hours_declarations', 'Hours_declarationController');

Route::resource('/companies', 'CompanyController');
