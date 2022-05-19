<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZipCodeCollection;
use App\Http\Resources\ZipCodeResource;
use App\Models\ZipCode;

class ZipCodeController extends Controller
{
    /**
     * @return \App\Http\Resources\ZipCodeCollection
     */
    public function index(): ZipCodeCollection
    {
        return new ZipCodeCollection(ZipCode::paginate());
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
