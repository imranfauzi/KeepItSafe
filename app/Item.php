<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{   
    //Table name
    protected $table = 'items';

    //fillable
    protected $fillable = ['name','place','description','photo'];


    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

}
