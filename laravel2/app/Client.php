<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
      //model adaugat de mine - de fapt arata detaliile unui client !!!!
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*
    protected $abonament;
    protected $pret;
    protected $descriere;
    protected $data_inceput;
    protected $data_sfarsit;
    protected $id;
    protected $user_id;
    protected $created_at;
    protected $modified_at;
    */

    protected $fillable = [
        'descriere', 'id', 'user_id', 'abonament', 'data_inceput', 'data_sfarsit', 'pret'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
       
    ];

    protected $table = 'clienti';

    public $timestamps = true;//false;
}
