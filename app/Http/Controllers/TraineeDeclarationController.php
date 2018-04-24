<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Hours_declaration;
use App\Declaration;
use App\Company;
use Auth;
use Illuminate\Support\Facades\Input;

class TraineeDeclarationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
//        $company = Company::find($id);
//        $user = User::find($id);
//        $date = Input::get('date');
//        var_dump($date);
//        
//        $declarations = Declaration::where('date_receipt','like',"$date%")->get();   
//     
//        echo $declarations;
//        
//        return view('admin.show_trainee')->with(compact('user', 'declarations', 'company'));
//
//

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('include')){
//            $fileNameWithExt = $request->file('include')->getClientOriginalName();
//            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
//            $extenstion = $request->file('include')->getClientOriginalExtension();
//            $fileNameToStore = $fileName. '-' .time().'.'.$extenstion;
              $fileNameToStore = 'test';
//            $path = $request->file ('include')->storeAs('public/images', $fileNameToStore);
         }else{ 
             $fileNameToStore =  'helaas';
         }    
        $user = Auth::user();
        $declaration = new Declaration;
        $declaration->date_receipt = $request->input('date_receipt');
        $declaration->type = $request->input('type');
        $declaration->btw = $request->input('btw');
        $declaration->total_receipt = $request->input('total_receipt');
        $declaration->description = $request->input('description');
        $declaration->user_id = $user->id;
        $declaration->include = $fileNameToStore;
        $declaration->save();
        error_log($declaration);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $date)
    {
      $user = User::find($id);  

      return $date;

//      $declarations = Declaration::where('user_id',$id)->get();
////      
//      return view('admin.show_trainee')->with(compact('declarations', 'user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($user_id, $declaration_id)
    {
        $user = User::find($user_id);
        $declaration = Declaration::find($declaration_id);


    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $user = Auth::user();
        $new = Declaration::find($id);
        $new->date_receipt = $request->input('date_receipt');
        $new->type = $request->input('type');
        $new->total_receipt = $request->input('total_receipt');
        $new->btw = $request->input('btw');
        $new->description = $request->input('description');
        $new->user_id = $user->id;


        $new->save();

        return redirect()->back()->with('succes', 'Declaratie succesvol aangepast');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
