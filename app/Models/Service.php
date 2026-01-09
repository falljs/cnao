<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'description',
        'departments',
    ];

    protected $casts = [
        'departments' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($service) {
            $service->slug = Str::slug($service->title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
