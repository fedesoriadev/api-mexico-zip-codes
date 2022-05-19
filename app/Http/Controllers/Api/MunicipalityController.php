<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MunicipalityCollection;
use App\Http\Resources\MunicipalityResource;
use App\Models\Municipality;

class MunicipalityController extends Controller
{
    /**
     * @return \App\Http\Resources\MunicipalityCollection
     */
    public function index(): MunicipalityCollection
    {
        return new MunicipalityCollection(Municipality::paginate());
    }

    /**
     * @param \App\Models\Municipality $municipality
     * @return \App\Http\Resources\MunicipalityResource
     */
    public function show(Municipality $municipality): MunicipalityResource
    {
        return new MunicipalityResource($municipality);
    }
}
