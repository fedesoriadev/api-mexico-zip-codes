<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
{
    use HasFactory;
    use HasKey;
    use HasName;

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'key',
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zipCode(): HasMany
    {
        return $this->hasMany(ZipCode::class);
    }
}
