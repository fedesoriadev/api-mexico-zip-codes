<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FederalEntity>
 */
class FederalEntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['key' => "int", 'name' => "string", 'code' => "null"])] public function definition(): array
    {
        return [
            'key'  => 9,
            'name' => 'CIUDAD DE MEXICO',
            'code' => null,
        ];
    }
}
