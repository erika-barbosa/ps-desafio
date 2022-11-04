<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->sentence($nbWords = 2, $variableNbWords = false),
            'descricao' => $this->faker->sentence($nbWords = 5, $variableNbWords = true),
            'quantidade' => $this->faker->numberBetween(0, 100),
            'preco' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),
            'imagem' => $this->faker->imageUrl(),
            'categoria_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
