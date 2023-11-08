<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table='horario';
    public $timestamps=true;
    protected $fillable=['Descripcion','HoraInicio','HoraFin'];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];
    public function scopeBuscar($query,$dato)
    {
        return $query->where('Descripcion','LIKE',"%$dato%");
    }
}
