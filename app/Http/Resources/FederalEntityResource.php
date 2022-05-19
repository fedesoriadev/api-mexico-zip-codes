<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class FederalEntityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    #[ArrayShape(['key' => "mixed", 'name' => "mixed", 'code' => "mixed"])] public function toArray($request): array
    {
        return [
            'key'  => $this->key,
            'name' => $this->name,
            'code' => !empty($this->code) ? $this->code : null,
        ];
    }
}
