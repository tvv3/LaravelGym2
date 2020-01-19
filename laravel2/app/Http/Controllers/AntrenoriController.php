<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;

class AntrenoriController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
  public  $proprietate='valoare_initiala'; //de exemplu ; apoi se folseste cu $this-proprietate;

    public function __construct()
    {
        $this->middleware('auth');

       // $this->middleware('log')->only('index');
       // $x=Auth::user(); // trebuie use Illuminate\Support\Facades\Auth;
        
    }

    public function index()
    {
        
        $user1 = Auth::user(); 
        //if (isset($user1)) if ($user1->role2=='admin') 
        return view('antrenori', ['userul' => $user1->name, 'idul' =>  $user1->id,
        'emailul' => $user1->email] );
        //return 'Nu sunteti logat ca administrator.';
    }
}