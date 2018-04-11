<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Hours_declaration;
use App\Declaration;
use App\Company;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        $declarations = Declaration::all();
        $hours = Hours_declaration::all();
        $users = User::all();
        return view('admin.index')->with('users',$users)->with('hours',$hours)->with('declarations', $declarations)->with('companies', $companies);
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
        $user = User::where('id',$id)->get();
        $hours = Hours_declaration::where('user_id',$id)->get();
        $declarations = Declaration::where('user_id',$id)->get();
        if(isset($user->company_id)){
          $company = Company::where('id',$user->company_id)->get();
        } else {
          $company = new Company;
          $company->name = 'Geen bedrijf';
        }
        return view('admin.show')->with('user',$user)->with('company',$company)->with('hours',$hours)->with('declarations',$declarations);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function showUserName($id)
    {
        $user = User::get();
        
        return view('trainee.formulier')->with('user',$user);
    }
    
    
    public function edit($id)
    {
        //
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
        //
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
