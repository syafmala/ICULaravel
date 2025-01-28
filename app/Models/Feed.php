<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Support\Str;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','user_id', 'isActive'];

    protected $casts = ['isActive' => 'string'];

    public function user(): BelongsTo{

        return $this->belongsTo(User::class);

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps()->withPivot('isActive');
    }

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::lower($value)
        );
    }

    public function upperCaseDescription(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::upper($this->description)
        );
    }

}
