<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrateur',
            'adresse' => 'Restaurant FAK-C',
            'email' => 'devmagame@gmail.com',
            'telephone' => '+229 96 23 13 21',
            'password' => bcrypt('admin'),
            'username' => 'admin',
            'naissance' => null,
            'repondant' => null,
            'repondantAdr' => null,
            'contact' => null,
            'salaire' => null,
            'etat' => 1,
            'profils_id' => 1,
            'postes_id' => 1
        ]);
    }
}
