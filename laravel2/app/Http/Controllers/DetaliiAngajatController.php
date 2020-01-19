<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Angajat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;     // pt updateOrInsert
use Illuminate\Http\RedirectResponse; // pt Route::post.... redirect....
use Illuminate\Support\Collection; // pt rezultatul db in $angajat

class DetaliiAngajatController extends Controller
{
    /**
     * Show the form to create detaliile angajatului selectat.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if (($request->isMethod('POST')) && ($request->user_id))
        {$user_id1= $request->user_id;
         $request->session()->put('u_id',$user_id1); 
         //obligatoriu ca atunci cand dam refresh in create din 
         //url sa se pastreze clientul !!!
         }
       elseif (($request->isMethod('GET')) && ($request->session()->get('u_id')))
        {$user_id1= $request->session()->get('u_id');}
       else 
       $user_id1= -1;
        
        
        $angajat = DB::table('angajati')
           ->where('user_id', '=', $user_id1)
           ->limit(1)
           ->get();
       // return view('detaliiangajat',['u_id'=>session('u_id')]);
        //else
        return view('detaliiangajat',['u_id'=>$user_id1, 'angajat'=>$angajat]);
        /*,
         'abonament'=>$client[0]->abonament,
        'pret'=>$client[0]->pret, 'data_inceput'=>$client[0]->data_inceput, 
        'data_sfarsit'=>$client[0]->data_sfarsit, 'descriere'=>$client[0]->descriere]);
       */
    }

    /*deletes an angajat detail for a given user*/
    public function delete(Request $request)
    {
        $users_count = DB::table('angajati')
            ->where('user_id', '=', $request->user_id)
            ->count();
        if ($users_count==0) 
        {return
        redirect()->back()
        ->with('statuserr',"Angajatul nu are detalii salvate in baza de date!");
        }
        //else
        DB::table('angajati')->where('user_id', '=', $request->user_id)
        ->delete();
        return redirect()->back()
                ->with('status',"Detaliile Angajatului au fost sterse!");
    
    }

    /**
     * Store a new detalii angajat
     *
     * @param  Request  $request
     * @return Response
     */
    //public  $abonament1;
    public  $user_id1;
    public function store(Request $request)
    {
       // $this->abonament1= $request->abonament;
    
        // Validate and store detaliile angajatului ...
        $validator = Validator::make($request->all(),
        [
            'descriere' => 'max:255',
            'salariu' => 'required',
        ]);
        //if (!$validateData) return 
        //'Nu ati completat pretul sau descrierea sau descrierea depaseste 255
        // caractere!';
       
        /*
        $validator->after(function ($validator) {
            
            if (!(array_search($this->abonament1,['lunar','anual'])))  
            {
                $validator->errors()->add('abonament', 
                'Something is wrong with this field!');
            }
        });*/

        $this->user_id1=$request->user_id; //trebuie transmis in functie ca parametru --- vezi vizibilitate variabile functie
        $validator->after(function ($validator) {
            if ( $this->user_id1==-1)  {
                $validator->errors()->add('user', 
                'You did not choose a user(angajat) to update!');
            }
        });
       // return 'xok';
          
        if ($validator->fails()) { $x=1;
            return  redirect('detaliiangajat/create')
                        ->withInput()
                        ->with('statuserror', 'Detaliile angajatului NU au fost updatate!')
                        ->with('u_id',$request->user_id)
                        ->withErrors($validator)
                        ;
        }

       else { $x=2;
        
        $u=new Angajat();
        $u->user_id=$request->user_id;
        $u->descriere=$request->descriere;
        $u->salariu=$request->salariu;

        /*DB::table('users') 
    ->updateOrInsert(
        ['email' => 'john@example.com', 'name' => 'John'],
        ['votes' => '2']
    );*/
    //use Illuminate\Support\Facades\DB; necesar pt db
    //nu mai folosesc update or insert din db 
    //creez detaliile cu updateorCreate din model
    $angajat=Angajat::updateOrCreate(['user_id'=>$u->user_id], //conditia dupa care decide daca face insert sau update
                     ['descriere'=>$u->descriere, //restul campurilor de updatat
                      'salariu'=>$u->salariu
                      ]);
        //sau $u->save() pt insert;
       
        //return $x;
        //return redirect('detaliiangajat/create')
          //  ->withInput();

            return redirect('detaliiangajat/create')
            ->withInput()
            ->with('statusok', 'Detaliile angajatului au fost updatate!')
            ->with('u_id',$request->user_id);

    

        }

    }
}