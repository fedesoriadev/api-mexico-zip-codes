<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZipCodeResource;
use App\Models\ZipCode;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ZipCodeController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ZipCodeResource::collection(ZipCode::paginate());
    }

    /**
     * @param \App\Models\ZipCode $zipCode
     * @return \App\Http\Resources\ZipCodeResource
     */
    public function show(ZipCode $zipCode): ZipCodeResource
    {
        return new ZipCodeResource($zipCode);
    }
}
