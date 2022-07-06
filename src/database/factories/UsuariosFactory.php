<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->phoneNumber(),
            'edad' => $this->faker->numberBetween(20,60),
            'fecha_contratacion' => $this->faker->dateTimeInInterval('-10 year','+3 days')
        ];
    }
}
