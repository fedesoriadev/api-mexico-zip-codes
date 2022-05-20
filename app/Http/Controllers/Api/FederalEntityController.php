<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FederalEntityResource;
use App\Models\FederalEntity;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FederalEntityController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return FederalEntityResource::collection(FederalEntity::all());
    }
}
