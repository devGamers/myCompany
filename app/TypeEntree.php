<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeEntree extends Model
{
    protected $fillable = ['libelle', 'activites_id'];

    public function activite()
    {
        return $this->belongsTo(Activite::class, 'activites_id');
    }


    public function entreeSorties()
    {
        return $this->hasMany(EntreeSortie::class, 'type_depenses_id');
    }
}
