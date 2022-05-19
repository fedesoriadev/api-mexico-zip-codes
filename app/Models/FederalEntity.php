<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FederalEntity extends Model
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
        'code'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zipCode(): HasMany
    {
        return $this->hasMany(ZipCode::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function code(): Attribute
    {
        return Attribute::set(fn($value, $attributes) => !empty($value) ? $value : null);
    }
}

