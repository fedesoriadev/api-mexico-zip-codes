<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FederalEntityCollection;
use App\Http\Resources\FederalEntityResource;
use App\Models\FederalEntity;

class FederalEntityController extends Controller
{
    /**
     * @return \App\Http\Resources\FederalEntityCollection
     */
    public function index(): FederalEntityCollection
    {
        return new FederalEntityCollection(FederalEntity::paginate());
    }

    /**
     * @param \App\Models\FederalEntity $federalEntity
     * @return \App\Http\Resources\FederalEntityResource
     */
    public function show(FederalEntity $federalEntity): FederalEntityResource
    {
        return new FederalEntityResource($federalEntity);
    }
}
