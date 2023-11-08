<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAlerta extends Model
{
    protected $table='tipo_alerta';
    protected $fillable=['Descripcion_Tipo_Alerta'];
    protected $guarded=['Id_Tipo_Alerta'];
}
