<?php

namespace Tests\Unit;

use App\Models\Settlement;
use App\Models\ZipCode;
use Tests\TestCase;

class ZipCodeTest extends TestCase
{
    /** @test */
    public function it_must_have_a_federal_entity_relation(): void
    {
        $zipCode = ZipCode::factory()->create();

        $this->assertEquals(1, $zipCode->federalEntity->count());
        $this->assertInstanceOf(\App\Models\FederalEntity::class, $zipCode->federalEntity);
    }

    /** @test */
    public function it_must_have_a_municipality_relation(): void
    {
        $zipCode = ZipCode::factory()->create();

        $this->assertEquals(1, $zipCode->municipality->count());
        $this->assertInstanceOf(\App\Models\Municipality::class, $zipCode->municipality);
    }

    /** @test */
    public function it_may_have_a_settlements_relation(): void
    {
        $zipCode = ZipCode::factory()->create();
        Settlement::factory()->create(['zip_code_id' => $zipCode->id]);

        $this->assertEquals(1, $zipCode->settlements->count());
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $zipCode->settlements);
    }

    /** @test */
    public function it_stores_locality_field_as_ascii_uppercase(): void
    {
        $zipCode = ZipCode::factory()->create(['locality' => 'México']);

        $this
            ->assertDatabaseHas('zip_codes', ['locality' => 'MEXICO'])
            ->assertEquals('MEXICO', $zipCode->locality);
    }
}
