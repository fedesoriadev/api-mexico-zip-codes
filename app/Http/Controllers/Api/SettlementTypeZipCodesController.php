<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZipCodeResource;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class SettlementTypeZipCodesController extends Controller
{
    /**
     * @param \App\Models\SettlementType $settlementType
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SettlementType $settlementType): AnonymousResourceCollection
    {
        // Direct query for better performance
        $zipCodes = DB::table('zip_codes', 'z')
            ->select('z.*')
            ->join('settlements', 'settlements.zip_code_id', '=', 'z.id')
            ->where('settlements.settlement_type_id', $settlementType->id)
            ->paginate(100);

        // Hydrate ZipCode model to construct relations and make Paginator
        $collection = new LengthAwarePaginator(
            ZipCode::hydrate($zipCodes->items()),
            $zipCodes->total(),
            $zipCodes->perPage(),
            $zipCodes->currentPage(),
            ['path' => $zipCodes->path()]
        );

        return ZipCodeResource::collection($collection);
    }
}
