<?php

use App\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profil::create([
            'libelle' => 'Administrateur',
            'menu' => 0
        ]);
    }
}
