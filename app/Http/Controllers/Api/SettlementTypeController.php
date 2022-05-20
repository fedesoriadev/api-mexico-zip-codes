<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettlementTypeResource;
use App\Models\SettlementType;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SettlementTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return SettlementTypeResource::collection(SettlementType::all());
    }
}
