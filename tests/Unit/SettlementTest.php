<?php

namespace Tests\Unit;

use App\Models\Settlement;
use Tests\TestCase;

class SettlementTest extends TestCase
{
    /** @test */
    public function it_must_have_a_zip_code_relation(): void
    {
        $settlement = Settlement::factory()->create();

        $this->assertEquals(1, $settlement->zipCode->count());
        $this->assertInstanceOf(\App\Models\ZipCode::class, $settlement->zipCode);
    }

    /** @test */
    public function it_must_have_a_settlement_type_relation(): void
    {
        $settlement = Settlement::factory()->create();

        $this->assertEquals(1, $settlement->settlementType->count());
        $this->assertInstanceOf(\App\Models\SettlementType::class, $settlement->settlementType);
    }

    /** @test */
    public function it_stores_name_field_as_ascii_uppercase(): void
    {
        $settlement = Settlement::factory()->create(['name' => 'México']);

        $this
            ->assertDatabaseHas('settlements', ['name' => 'MEXICO'])
            ->assertEquals('MEXICO', $settlement->name);
    }

    /** @test */
    public function it_stores_key_field_as_integer(): void
    {
        $settlement = Settlement::factory()->create(['key' => '09']);

        $this
            ->assertDatabaseHas('settlements', ['key' => 9])
            ->assertEquals(9, $settlement->key);
    }
}
