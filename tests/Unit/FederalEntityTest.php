<?php

namespace Tests\Unit;

use App\Models\FederalEntity;
use App\Models\ZipCode;
use Tests\TestCase;

class FederalEntityTest extends TestCase
{
    /** @test */
    public function it_may_have_a_zip_codes_relation(): void
    {
        $federalEntity = FederalEntity::factory()->create();
        ZipCode::factory()->create(['federal_entity_id' => $federalEntity->id]);

        $this->assertEquals(1, $federalEntity->zipCode->count());
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $federalEntity->zipCode);
    }

    /** @test */
    public function it_stores_name_field_as_ascii_uppercase(): void
    {
        $federalEntity = FederalEntity::factory()->create(['name' => 'México']);

        $this
            ->assertDatabaseHas('federal_entities', ['name' => 'MEXICO'])
            ->assertEquals('MEXICO', $federalEntity->name);
    }

    /** @test */
    public function it_stores_key_field_as_integer(): void
    {
        $federalEntity = FederalEntity::factory()->create(['key' => '09']);

        $this
            ->assertDatabaseHas('federal_entities', ['key' => 9])
            ->assertEquals(9, $federalEntity->key);
    }

    /** @test */
    public function it_stores_code_field_as_null_if_empty(): void
    {
        $federalEntity = FederalEntity::factory()->create(['code' => '']);

        $this->assertDatabaseHas('federal_entities', ['code' => null]);
        $this->assertNull($federalEntity->code);
    }
}
