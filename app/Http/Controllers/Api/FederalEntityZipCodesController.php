<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZipCodeResource;
use App\Models\FederalEntity;
use App\Models\ZipCode;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FederalEntityZipCodesController extends Controller
{
    /**
     * @param \App\Models\FederalEntity $federalEntity
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(FederalEntity $federalEntity): AnonymousResourceCollection
    {
        return ZipCodeResource::collection(
            ZipCode::where('federal_entity_id', $federalEntity->id)->paginate()
        );
    }
}
