<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Hours_declaration;
use App\Declaration;
use App\Company;
use Auth;
class AdminController extends Controller
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
        $admin = User::find($id);
        $companies = Company::all();
        $declarations = Declaration::all();
        $hours = Hours_declaration::all();
        $users = User::all();
        return view('admin.show')->with(compact('users','hours','declarations','companies','admin'));
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
        $companies = Company::find($id);
        $hours = Hours_declaration::find($id);
        
       
        return view('admin.edit_trainee')->with(compact('user','companies'));
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
//        $user = Auth::user();

        $new = User::find($id);

        $new->first_name = $request->input('first_name');
        $new->last_name = $request->input('last_name');
        $new->email = $request->input('email');

        $new->admin = $request->input('admin');


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
