<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class SettlementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    #[ArrayShape([
        'key'             => "mixed",
        'name'            => "mixed",
        'zone_type'       => "mixed",
        'settlement_type' => "mixed"
    ])] public function toArray($request): array
    {
        return [
            'key'             => $this->key,
            'name'            => $this->name,
            'zone_type'       => $this->zone_type,
            'settlement_type' => SettlementTypeResource::make($this->settlementType)
        ];
    }
}
