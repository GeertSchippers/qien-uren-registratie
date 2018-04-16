<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Hours_declaration;
use App\Declaration;
use App\Company;
use Illuminate\Support\Facades\Auth;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::find($id);
      $hours = Hours_declaration::where('user_id',$id)->get();
      $declarations = Declaration::where('user_id',$id)->get();
      if(isset($user->company_id)){
        $company = Company::find($user->company_id);
      } else {
        $company = new Company;
        $company->name = 'Geen bedrijf';
      }

      if( Auth::user()->admin == 1 ){

          return view('admin.show_trainee')->with(compact('user','company','hours','declarations'));

      } else {
          
          return view('/trainee/show')->with(compact('user','hours','declarations','company'));

      }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $company = Company::find($user->company_id);
        $hours = Hours_declaration::find($id);
        
        
        $companies = Company::all();
        $select = [];
        foreach($companies as $company2){
            $select[$company2->id] = $company2->name;
            error_log(http_build_query($select));
        }
        return view('admin.edit_trainee')->with(compact('user','company', 'select'));
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
        $new = User::find($id);

        $new->first_name = $request->input('first_name');
        $new->last_name = $request->input('last_name');
        $new->email = $request->input('email');
        $new->company_id = $request->input('company');
        $new->admin = $request->input('admin');

        $new->save();        
        return redirect()->back();
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
