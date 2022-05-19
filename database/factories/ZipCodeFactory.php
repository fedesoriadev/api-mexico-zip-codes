<?php

namespace Database\Factories;

use App\Models\FederalEntity;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ZipCode>
 */
class ZipCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['zip_code'          => "string",
                  'locality'          => "string",
                  'federal_entity_id' => "mixed",
                  'municipality_id'   => "mixed"
    ])] public function definition(): array
    {
        return [
            'zip_code' => '01210',
            'locality' => "CIUDAD DE MEXICO",
            'federal_entity_id' => FederalEntity::factory(),
            'municipality_id' => Municipality::factory(),
        ];
    }
}
