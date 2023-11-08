<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table='tramite';
    public $timestamps=true;
    protected $fillable=['Anio','Expediente','Comentario','Adjunto','Fecha','Usuario'];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];
    public function scopeBuscar($query,$dato)
    {
        return $query->where('Expediente','LIKE',$dato); 
    }
}
