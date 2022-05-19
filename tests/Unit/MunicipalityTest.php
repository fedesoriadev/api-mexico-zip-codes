<?php

namespace Tests\Unit;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\ZipCode;
use Tests\TestCase;

class MunicipalityTest extends TestCase
{
    /** @test */
    public function it_may_have_a_zip_codes_relation(): void
    {
        $municipality = Municipality::factory()->create();
        ZipCode::factory()->create(['municipality_id' => $municipality->id]);

        $this->assertEquals(1, $municipality->zipCode->count());
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $municipality->zipCode);
    }

    /** @test */
    public function it_stores_name_field_as_ascii_uppercase(): void
    {
        $municipality = Municipality::factory()->create(['name' => 'México']);

        $this
            ->assertDatabaseHas('municipalities', ['name' => 'MEXICO'])
            ->assertEquals('MEXICO', $municipality->name);
    }

    /** @test */
    public function it_stores_key_field_as_integer(): void
    {
        $municipality = Municipality::factory()->create(['key' => '09']);

        $this
            ->assertDatabaseHas('municipalities', ['key' => 9])
            ->assertEquals(9, $municipality->key);
    }
}
