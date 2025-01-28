<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function feeds()
    {
        return $this->belongsToMany(Feed::class)->withTimestamps()->withPivot('isActive');
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value),
        );
    }
}
