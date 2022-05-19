<?php

namespace Tests\Unit;

use App\Models\Settlement;
use App\Models\SettlementType;
use Tests\TestCase;

class SettlementTypeTest extends TestCase
{
    /** @test */
    public function it_may_have_a_settlements_relation(): void
    {
        $settlementType = SettlementType::factory()->create();
        Settlement::factory()->create(['settlement_type_id' => $settlementType->id]);

        $this->assertEquals(1, $settlementType->settlements->count());
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $settlementType->settlements);
    }
}
