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
});
Route::resource('/admin', 'UserController');


Route::get('/hours_declarations/{data}', function($id){
    $declarations = App\Hours_declaration::where('user_id',$id)->get();
    return $declarations;
});


Route::post('verify', function(){
   $data = $_POST;
   return $data;
});

//Route::post('/hours_declarations', 'Hours_declarationController@create');
    
//Route::post('/posttest', function(\Illuminate\Http\Request $request) {
//    return response()->json(['message' => $request['data']]);
//    
//})->name('edit');
 


    
