<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZipCodeResource;
use App\Models\Municipality;
use App\Models\ZipCode;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MunicipalityZipCodesController extends Controller
{
    /**
     * @param \App\Models\Municipality $municipality
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Municipality $municipality): AnonymousResourceCollection
    {
        return ZipCodeResource::collection(
            ZipCode::where('municipality_id', $municipality->id)->paginate()
        );
    }
}
