<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = ['libelle'];

    public function entreeSorties() {
        return $this->hasMany(EntreeSortie::class, 'activites_id');
    }

    public function type_depenses()
    {
        return $this->hasMany(TypeDepense::class, 'activites_id')->latest();
    }
}
