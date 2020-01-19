<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Angajat;
use Illuminate\Support\Facades\DB;
class AntrenoriPageController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
  public  $proprietate='valoare_initiala'; //de exemplu ; apoi se folseste cu $this-proprietate;

    public function __construct()
    {
        //$this->middleware('guest');

       // $this->middleware('log')->only('index');
      
    }

    public function index()
    {
        /*
        $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
            */
        $antrenori = DB::table('users')
        ->leftJoin('angajati', 'users.id', '=', 'angajati.user_id')
        ->where('users.role', '=', 'antrenor')
         ->select('users.id', 'users.name', 'users.role', 'angajati.descriere')
         ->orderBy('users.name', 'asc')
        ->get();

        return view('antrenori', ['antrenori' => $antrenori] );
        
        //else 
       
    }
}