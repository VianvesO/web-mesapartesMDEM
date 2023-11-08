<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correlativo extends Model
{
    protected $table='correlativo';
    public $timestamps=true;
    protected $fillable=['Anio','Numero'];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];

}

