<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdministrareController extends Controller
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
        //$x=Auth::user(); // trebuie use Illuminate\Support\Facades\Auth;
       
    }

    public function index()
    {
        $clients = User::where("role","client")->paginate(3);
        ////trebuie pus sus use App/User si aici doar User!!!
        $user1 = Auth::user(); //functia user aduce tot obiectul !!!
           // nu trebuie pus $this->$user1 ci $this->user1 !!!
           if (isset($user1))
           if ($user1->role2=='admin') 
        return view('administrare', ['userul' => $user1->name, 'idul' =>  $user1->id,
        'emailul' => $user1->email, 'clients' => $clients] );
        //else 
        return view('mesaj',['mesaj'=>'Nu sunteti logat ca administrator.']);
    }
}