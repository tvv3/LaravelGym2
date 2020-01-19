<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;     // pt updateOrInsert
use Illuminate\Http\RedirectResponse; // pt Route::post.... redirect....
use Illuminate\Support\Collection; // pt rezultatul db in $client

class DetaliiClientController extends Controller
{
    /**
     * Show the form to create detaliile clientului selectat.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if (($request->isMethod('POST')) && ($request->user_id))
         {$user_id1= $request->user_id;
          $request->session()->put('u_id',$user_id1); //obligatoriu ca atunci cand dam refresh in create din url sa pastreze clientul !!!
          }
        elseif (($request->isMethod('GET')) && ($request->session()->get('u_id')))
         {$user_id1= $request->session()->get('u_id');}
        else 
        $user_id1= -1;
        
        
        $client = DB::table('clienti')
           ->where('user_id', '=', $user_id1)
           ->limit(1)
           ->get();
       // return view('detaliiclient',['u_id'=>session('u_id')]);
       $metoda=$request->method();
        //else
        return view('detaliiclient',['u_id'=>$user_id1, 'client'=>$client/*,'metoda'=>$metoda*/]);
        /*,
         'abonament'=>$client[0]->abonament,
        'pret'=>$client[0]->pret, 'data_inceput'=>$client[0]->data_inceput, 
        'data_sfarsit'=>$client[0]->data_sfarsit, 'descriere'=>$client[0]->descriere]);
       */
    }

    /*deletes a client detail for a given user*/
    public function delete(Request $request)
    {
        $users_count = DB::table('clienti')
            ->where('user_id', '=', $request->user_id)
            ->count();
        if ($users_count==0) 
        {return
        redirect()->back()
        ->with('statuserr',"Clientul nu are detalii salvate in baza de date!");
        }
        //else
        DB::table('clienti')->where('user_id', '=', $request->user_id)->delete();
        return redirect()->back()
                ->with('status',"Client's details deleted");
    
    }

    /**
     * Store a new detalii client
     *
     * @param  Request  $request
     * @return Response
     */
    //public  $abonament1;
    public  $user_id1;
    public function store(Request $request)
    {
        $this->abonament1= $request->abonament;
    
        // Validate and store detaliile clientului ...
        $validator = Validator::make($request->all(),
        [
            'descriere' => 'required|max:255',
            'pret' => 'required',
            'data_inceput' => 'required|date|after:tomorrow',
            'data_sfarsit' => 'required|date|after:data_inceput',
            'abonament' => ['required',
                   Rule::in(['lunar','anual'])
                            ],
        ]);
        //if (!$validateData) return 'Nu ati completat pretul sau descrierea sau descrierea depaseste 255 caractere!';
       
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
                'You did not choose a user(client) to update!');
            }
        });
       // return 'xok';
          
        if ($validator->fails()) { $x=1;
            return  redirect('detaliiclient/create')
                        ->withInput()
                        ->with('statuserror', 'Client Details NOT updated!')
                        ->with('u_id',$request->user_id)
                        ->withErrors($validator)
                        ;
        }

       else { $x=2;
        
        $u=new Client();
        $u->user_id=$request->user_id;
        $u->descriere=$request->descriere;
        $u->abonament=$request->abonament;
        $u->data_inceput=$request->data_inceput;
        $u->data_sfarsit=$request->data_sfarsit;
        $u->pret=$request->pret;

        /*DB::table('users')
    ->updateOrInsert(
        ['email' => 'john@example.com', 'name' => 'John'],
        ['votes' => '2']
    );*/


    //use Illuminate\Support\Facades\DB; necesar pt db
   // DB::table('clienti') ->updateOrInsert
    //nu mai folosesc update or insert din db care nu-mi seteaza coloanele
    //created_at si updated_at automat 
    //creez detaliile cu updateorCreate din model
    $client=Client::updateOrCreate
    (['user_id'=>$u->user_id], //conditia dupa care decide daca face insert sau update
                     ['descriere'=>$u->descriere, //restul campurilor de updatat
       'abonament'=>$u->abonament,'data_inceput'=>$u->data_inceput,
        'data_sfarsit'=>$u->data_sfarsit,'pret'=>$u->pret]);
        //sau $u->save() pt insert;
       
        //return $x;
        //return redirect('detaliiclient/create')
          //  ->withInput();

            return redirect('detaliiclient/create')
            ->withInput()
            ->with('statusok', 'Client Details updated!')
            ->with('u_id',$request->user_id);

   

        }

    }
}