<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrenor extends Model
{
   //model adaugat de mine
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descriere', 'id', 'user_id', 'salariu'
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

    protected $table = 'antrenori';

    public $timestamps = true;//false;
}
