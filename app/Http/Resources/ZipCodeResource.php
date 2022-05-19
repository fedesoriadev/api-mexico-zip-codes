<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class ZipCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    #[ArrayShape([
        'zip_code'       => "mixed",
        'locality'       => "mixed",
        'federal_entity' => "mixed",
        'settlements'    => "\Illuminate\Http\Resources\Json\AnonymousResourceCollection",
        'municipality'   => "mixed"
    ])] public function toArray($request): array
    {
        return [
            'zip_code'       => $this->zip_code,
            'locality'       => !empty($this->locality) ? $this->locality : null,
            'federal_entity' => FederalEntityResource::make($this->federalEntity),
            'settlements'    => SettlementResource::collection($this->settlements),
            'municipality'   => MunicipalityResource::make($this->municipality)
        ];
    }
}
