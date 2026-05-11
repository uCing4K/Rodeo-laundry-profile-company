<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';

    protected $fillable = [
        'name', 'description', 'base_price', 'service_type_id',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
    ];

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }
}
