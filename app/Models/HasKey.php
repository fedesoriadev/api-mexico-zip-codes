<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasKey
{
    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function key(): Attribute
    {
        return Attribute::set(fn($value, $attributes) => intval($value));
    }
}
