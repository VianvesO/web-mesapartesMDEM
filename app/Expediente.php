<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table='expediente';
    public $timestamps=true;
    protected $fillable=['Anio','Fecha','Hora','Tipo','Asunto','TipoPersona','NumDocumento','Remitente','Archivo','Correo','Telefono','NroExpediente','NroExpedientetxt','Estado','Observaciones','Folios','CodSeguridad'];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];
    public function scopeBuscar($query,$dato)
    {
        return $query->where('NroExpediente','LIKE',$dato)->orWhere('Remitente','LIKE',"%$dato%")->orWhere('Asunto','LIKE',"%$dato%")->orWhere('NumDocumento','LIKE',"%$dato%");
    }
    public function scopeBuscarExpe($query,$dato)
    {
        return $query->where('NroExpediente',$dato);
    }



}
