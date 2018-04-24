<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = Auth::user();

        if($user->role == 0){
            return redirect("/trainees/$user->id");
        } elseif($user->role == 1) {
           return redirect("/admins/$user->id");
        } else {
           return redirect("/companies/$user->company_id");
        }
    }
}
