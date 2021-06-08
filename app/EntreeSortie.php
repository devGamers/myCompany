<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntreeSortie extends Model
{
    protected $fillable = ['date', 'description', 'entree', 'sortie', 'activites_id', 'type_depenses_id'];

    /**
     * Get the activite that owns the Comptabilite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activite()
    {
        return $this->belongsTo(Activite::class, 'activites_id');
    }

    public function type_depense()
    {
        return $this->belongsTo(TypeDepense::class, 'type_depenses_id');
    }
}
