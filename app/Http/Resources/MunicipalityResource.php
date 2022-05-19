<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class MunicipalityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    #[ArrayShape(['key' => "mixed", 'name' => "mixed"])] public function toArray($request): array
    {
        return [
            'key'  => $this->key,
            'name' => $this->name
        ];
    }
}
