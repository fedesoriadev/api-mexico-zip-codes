<?php

namespace Tests\Feature\Api;

use App\Enums\ZoneType;
use App\Models\Settlement;
use Tests\TestCase;

class ZipCodesEndpointTest extends TestCase
{
    /** @test */
    public function it_fetches_a_single_zip_code(): void
    {
        $settlement = Settlement::factory()->create();

        $this
            ->getJson("/api/zip-codes/{$settlement->zipCode->zip_code}")
            ->assertStatus(200)
            ->assertExactJson([
                'zip_code'       => '01210',
                'locality'       => 'CIUDAD DE MEXICO',
                'federal_entity' => [
                    'key'  => 9,
                    'name' => 'CIUDAD DE MEXICO',
                    'code' => null
                ],
                'settlements'    => [
                    [
                        'key'             => 82,
                        'name'            => 'SANTA FE',
                        'zone_type'       => ZoneType::URBANO->value,
                        'settlement_type' => [
                            'name' => 'Pueblo'
                        ]
                    ]
                ],
                'municipality'   => [
                    'key'  => 10,
                    'name' => 'ALVARO OBREGON'
                ]
            ]);
    }

    /** @test */
    public function it_throws_404_if_zip_code_does_not_exists(): void
    {
        $this
            ->getJson('/api/zip-codes/NOT-EXISTING')
            ->assertStatus(404);
    }
}
