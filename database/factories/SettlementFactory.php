<?php

namespace Database\Factories;

use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settlement>
 */
class SettlementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['key'                => "int",
                  'name'               => "string",
                  'zone_type'          => "string",
                  'settlement_type_id' => "mixed",
                  'zip_code_id'        => "mixed"
    ])] public function definition(): array
    {
        return [
            'key'                => 82,
            'name'               => 'SANTA FE',
            'zone_type'          => 'URBANO',
            'settlement_type_id' => SettlementType::factory(),
            'zip_code_id'        => ZipCode::factory()
        ];
    }
}
