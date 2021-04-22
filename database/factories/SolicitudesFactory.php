<?php

namespace Database\Factories;

use App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solicitudes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'placa' => $this->faker->sentence(3),
            'curp' => $this->faker->sentence(3),
            'folio' => $this->faker->sentence(3),
            'informacion' => $this->faker->paragraph()
        ];
    }
}
