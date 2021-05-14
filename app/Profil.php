<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = ['libelle', 'menu'];

    /**
     * The primes that belong to the Profil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function primes()
    {
        return $this->belongsToMany(Prime::class, 'prime_postes', 'primes_id', 'postes_id');
    }
}
