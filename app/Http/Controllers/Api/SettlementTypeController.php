<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettlementTypeCollection;
use App\Http\Resources\SettlementTypeResource;
use App\Models\SettlementType;

class SettlementTypeController extends Controller
{
    /**
     * @return \App\Http\Resources\SettlementTypeCollection
     */
    public function index(): SettlementTypeCollection
    {
        return new SettlementTypeCollection(SettlementType::paginate());
    }

    /**
     * @param \App\Models\SettlementType $settlementType
     * @return \App\Http\Resources\SettlementTypeResource
     */
    public function show(SettlementType $settlementType): SettlementTypeResource
    {
        return new SettlementTypeResource($settlementType);
    }
}
