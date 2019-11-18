<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $fillable = ['name', 'surname', 'nuhsa','enfermedad_id'];


    public function citas()
    {
        return $this->hasMany('App\Cita');
    }

    public function enfermedads()
    {
        return $this->belongTo('App\Enfermedad');
    }


    public function getFullNameAttribute()
    {
        return $this->name .' '.$this->surname;
    }
}
