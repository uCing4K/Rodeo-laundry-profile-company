<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_number', 'tracking_token', 'customer_id',
        'customer_name', 'customer_phone', 'service_type_id',
        'status', 'status_note', 'total_items', 'total_weight',
        'subtotal', 'additional_cost', 'discount', 'total_price',
        'payment_status', 'payment_method', 'notes',
        'estimated_done_at', 'completed_at', 'picked_up_at',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'additional_cost' => 'decimal:2',
        'discount' => 'decimal:2',
        'total_price' => 'decimal:2',
        'total_weight' => 'decimal:2',
        'total_items' => 'integer',
        'estimated_done_at' => 'datetime',
        'completed_at' => 'datetime',
        'picked_up_at' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function scopeByOrderNumber($query, string $orderNumber)
    {
        return $query->where('order_number', $orderNumber);
    }

    public function scopeByTrackingToken($query, string $token)
    {
        return $query->where('tracking_token', $token);
    }

    public static function findByQuery(string $query): ?self
    {
        return static::where('order_number', $query)
                     ->orWhere('tracking_token', $query)
                     ->first();
    }

    public function getStatusDescriptionAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'Pesanan diterima, menunggu diproses',
            'processing' => 'Sedang dalam proses cuci/setrika',
            'done' => 'Selesai, siap diambil',
            'picked_up' => 'Sudah diambil oleh pelanggan',
            'cancelled' => 'Pesanan dibatalkan',
            default => '-',
        };
    }

    public function getStatusIconAttribute(): string
    {
        return match ($this->status) {
            'pending' => '🕐',
            'processing' => '🔄',
            'done' => '✅',
            'picked_up' => '📦',
            'cancelled' => '❌',
            default => '❓',
        };
    }
}
