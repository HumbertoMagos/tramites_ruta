<?php

namespace Database\Seeders;

use App\Models\Solicitudes;

use Illuminate\Database\Seeder;


class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solicitudes::factory(20)->create();
    }
}
