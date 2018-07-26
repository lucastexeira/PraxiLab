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

    	$this->call(rubrosSeeder::class);
        $this->call(serviciosSeeder::class);
        $this->call(personasSeeder::class);
        $this->call(personasServiciosSeeder::class);
        $this->call(practicasSeeder::class);
        $this->call(estadosSeeder::class);
        $this->call(historialPracticasSeeder::class);
        //<$this->call(CurriculumSeeder::class);
    }
}
