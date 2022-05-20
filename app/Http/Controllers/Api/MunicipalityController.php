<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MunicipalityResource;
use App\Models\Municipality;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MunicipalityController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return MunicipalityResource::collection(Municipality::all());
    }
}
