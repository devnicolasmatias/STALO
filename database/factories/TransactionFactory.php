<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'value' => $this->faker->randomFloat(2, 10, 1000),
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'document_path' => null,
            'status' => $this->faker->randomElement(['Em processamento', 'Aprovada', 'Negada']),
        ];
    }
}
