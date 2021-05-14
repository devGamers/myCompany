<?php

use App\Poste;
use Illuminate\Database\Seeder;

class PosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Poste::create([
            'libelle' => 'Administrateur'
        ]);
    }
}
