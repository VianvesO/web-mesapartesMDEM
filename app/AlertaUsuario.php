<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlertaUsuario extends Model
{
    protected $table='alerta_usuario';
    public $timestamps=false;
    protected $fillable=['Id_Usuario_Alerta','Id_Tipo_Alerta','Id_Donde_Alerta','Id_Cuando_Alerta','Id_A_Quien_Alerta','Longitud','Latitud','Estado_Alerta','Descripcion_Alerta','Fecha_Alerta','Hora_Alerta','Hora_Atencion','fotografia_alerta','fecha_reporte'];
    protected $guarded=['Id_Alerta'];
    //protected $hidden=['created_at','updated_at'];
    public function scopeBuscar($query,$dato)
    {
        return $query->where('Longitud','LIKE',"%$dato%")
        			->orWhere('Latitud','LIKE',"%$dato%");
    }
}
