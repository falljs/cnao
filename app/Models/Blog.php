<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'description',
        'blog_category_id',
        'view_count',
    ];

    protected $casts = [
        'view_count' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

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
