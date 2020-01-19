<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
class AdministrareAngajatiController extends Controller 
// trebuie ca (numele clasei=nume fisier) altfel da eroare target class controlller ... not found
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
  public  $proprietate='valoare_initiala'; //apoi se foloseste cu $this-proprietate;

    public function __construct()
    {
        $this->middleware('auth');

       // $x=Auth::user(); // trebuie use Illuminate\Support\Facades\Auth;
       
    }

    public function index()
    {
       
        $user1 = Auth::user(); //functia user aduce tot obiectul
           // trebuie folosit $this->user1 

           if (isset($user1))
           if ($user1->role2=='admin') 
           {
            $angajati = User::where("role",'!=',"client")
            ->where('id','!=',$user1->id)
            ->paginate(3);////trebuie pus sus use App/User si aici doar User
 
        return view('administrareangajati', ['userul' => $user1->name, 
        'idul' =>  $user1->id,
        'emailul' => $user1->email, 'angajati' => $angajati] );
           }
        //else 
        //return 'Nu sunteti logat ca administrator.';
        return view('mesaj',['mesaj'=>'Nu sunteti logat ca administrator.']);
    }
}