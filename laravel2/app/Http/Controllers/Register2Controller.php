<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;     // pt Insert
use Illuminate\Http\RedirectResponse; // pt Route::post.... redirect....
use Illuminate\Support\Collection; // pt rezultatul db in $angajat

class Register2Controller extends Controller
{
    use  RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'administrare';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest');
       $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required','string', 'max:255'], //adaugat de mine
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $data)
    {

        $user1 = Auth::user(); //functia user aduce tot obiectul !!!
           // nu trebuie pus $this->$user1 ci $this->user1 !!!
        if (isset($user1))
        if($user1->role2=='admin')
        {
        $u1= User::create([
            'name' => $data->name,
            'role' => $data->role,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'role2' => 'user',
        ]);

       /* 
         este suficient ce este mai sus in create 
          DB::table('users')->insert([
            'name' => $data->name,
            'role' => $data->role,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'role2' => 'user',
        ]);*/
        return redirect('administrareangajati');
          }
          //else 
         // return 'Nu sunteti logat ca admin. Nu puteti salva angajati in sistem.';
         return view('mesaj',['mesaj'=>'Nu sunteti logat ca admin. Nu puteti salva angajati in sistem.']);
    
        }

   
}
