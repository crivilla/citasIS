<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ['fecha_inicio', 'fecha_fin', 'descripcion'];



    public function medicacions()
    {
        return $this->hasMany('App\Medicacion');
    }

}
