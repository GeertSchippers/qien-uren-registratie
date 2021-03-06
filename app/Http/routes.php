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
Use App\Declaration;
Use App\Company;
use Illuminate\Http\Request;
use App\Client;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

// ---------------------- Custom Routes ------------------------


Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::get('/formulier', function(){
  $user = Auth::user();
  $id = $user->id;
  $hours = Hours_declaration::where('user_id',$id)->get();
  $declarations = Declaration::where('user_id',$id)->get();

  if(isset($user->company_id)){
    $company = Company::where('id',$user->company_id)->get();
  } else {
    $company = new Company;
    $company->name = 'Geen bedrijf';
  }

   return view('trainee/formulier')->with(compact('user','hours','declarations','company'));
});

Route::get('/admin/trainee/{id}', 'UserController@show');

Route::get('/bulkdeclarations/{id}/{status}', 'DeclarationController@sendDeclarations');

Route::get('/bulkhourdeclarations/{id}/{status}', 'Hours_declarationController@sendDeclarations');

Route::get('/storage/{filename}', function ($filename)
{
    $file = Storage::disk('local')->get($filename);

    return new Response($file,200);
});

// -------------------- Resourced Routes ----------------------

Route::auth();

Route::resource('/trainees', 'TraineeController');

Route::resource('/admins', 'AdminController');

Route::resource('/declarations','DeclarationController');


Route::resource('/hours_declarations', 'Hours_declarationController');

Route::resource('/companies', 'CompanyController');

Route::resource('/trainees.declarations', 'TraineeDeclarationController');

Route::resource('/trainees.hours_declarations', 'TraineeHours_declarationController');
