<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prime extends Model
{
    protected $fillable = ['libelle', 'valeur'];

    public function postes()
    {
        return $this->belongsToMany(Poste::class, 'prime_postes', 'postes_id', 'postes_id');
    }
}
