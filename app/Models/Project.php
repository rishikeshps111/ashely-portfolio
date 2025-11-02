<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_category_id',
        'title',
        'description',
        'client_name',
        'author',
        'keywords',
        'date',
        'url',
        'image',
        'is_active',
        'slug',
        'images'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'keywords' => 'array',
        'images' => 'array',
        'date' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return asset('assets/img/dummy.jpeg');
        }

        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }

    public function getImageUrlsAttribute()
    {
        if (!$this->images || !is_array($this->images)) {
            return [asset('assets/img/dummy.jpeg')];
        }

        return collect($this->images)->map(function ($image) {
            return asset('storage/' . $image);
        })->toArray();
    }
}
