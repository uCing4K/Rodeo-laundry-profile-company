<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';

    protected $fillable = [
        'name', 'slug', 'description', 'icon', 'image',
        'type', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function activeProducts(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id')
        ->where('is_active', true)
        ->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeReguler($query)
    {
        return $query->where('type', 'reguler');
    }

    public function scopePremium($query)
    {
        return $query->where('type', 'premium');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('type')->orderBy('sort_order');
    }
}
