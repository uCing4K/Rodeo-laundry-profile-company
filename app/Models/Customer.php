<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name', 'phone', 'email', 'address',
        'customer_type', 'business_name', 'notes',
        'total_orders', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'total_orders' => 'integer',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePersonal($query)
    {
        return $query->where('customer_type', 'personal');
    }

    public function scopeBusiness($query)
    {
        return $query->where('customer_type', 'business');
    }
}
