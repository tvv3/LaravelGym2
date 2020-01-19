<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Client;
class ClientPageController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
  public  $proprietate='valoare_initiala'; //exemplu ; apoi se folseste cu $this-proprietate;

    public function __construct()
    {
        $this->middleware('auth');

       // $this->middleware('log')->only('index');
       //  $x=Auth::user(); // trebuie use Illuminate\Support\Facades\Auth;
        
    }

    public function index()
    {
        
        $user1 = Auth::user(); //functia user aduce tot obiectul !!!
           // nu trebuie pus $this->$user1 ci $this->user1 !!!
        if (isset($user1))
        if($user1->role=='client')
        {
        $detalii = Client::where('user_id', $user1->id)
        //->orderBy('name', 'desc')
        ->take(1)
        ->get();

        return view('clientpage', ['userul' => $user1->name, 'idul' =>  $user1->id,
        'emailul' => $user1->email, 'detaliile' => $detalii] );
        }
        //else 
        return view('mesaj',['mesaj'=>'Nu sunteti logat ca si client.']);
    }
}