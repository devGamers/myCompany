<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProfilSeeder::class);
        $this->call(PosteSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ParametreSeeder::class);
    }
}
