<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Hours_declaration;
use App\Declaration;
use App\Company;
use Auth;

class TraineeHours_declarationController extends Controller
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

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $hours_id = Hours_declaration::find($id);

        return view('trainee.edit')->with('user',$hours_id);
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
//        $hours = $request->json()->all();
////
      
        $user = Auth::user();

        $hours = Hours_declaration::find($id);
        $hours->amount = $request->input('amount');
        $hours->type = $request->input('type');
        $hours->date = $request->input('date');
        $hours->statement = $request->input('statement');
        $hours->updated_at = $request->input('updated_at');
        $user->user_id = $user->id;

        $hours->save();
        return redirect()->back()->with('succes', 'Uren succesvol aangepast');
//        return view('/trainee.show')->with('user', $user)->with('hours', $hours)->with('succes', 'Uren succesvol aangepast');
    }
    /**s
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
