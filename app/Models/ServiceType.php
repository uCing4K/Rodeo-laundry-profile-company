<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceType extends Model
{
    protected $table = 'service_types';

    protected $fillable = [
        'name', 'description', 'estimated_duration', 'additional_cost',
    ];

    protected $casts = [
        'additional_cost' => 'decimal:2',
    ];

    public function serviceCategories(): HasMany
    {
        return $this->hasMany(ServiceCategory::class, 'service_type_id');
    }
}
