<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Settlement extends Model
{
    use HasFactory;
    use HasKey;
    use HasName;

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'key',
        'name',
        'zone_type',
        'settlement_type_id',
        'zip_code_id'
    ];

    /**
     * @inheritdoc
     */
    protected $with = ['settlementType'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function settlementType(): BelongsTo
    {
        return $this->belongsTo(SettlementType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zipCode(): BelongsTo
    {
        return $this->belongsTo(ZipCode::class);
    }
}
