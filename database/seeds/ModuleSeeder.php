<?php
use App\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'name' => 'Gestion des travailleurs'
        ]);
        Module::create([
            'name' => 'Gestion des entrées et sorties'
        ]);
    }
}
