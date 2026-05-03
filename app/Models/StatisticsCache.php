<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StatisticsCache extends Model
{
    protected $table = 'statistics_cache';

    protected $fillable = [
        'stat_key', 'stat_value', 'stat_label',
        'stat_icon', 'sort_order', 'is_active',
        'last_calculated_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'last_calculated_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public static function recalculate(): void
    {
        $now = now();

        static::where('stat_key', 'total_orders_completed')->update([
            'stat_value' => (string) Order::whereIn('status', ['done', 'picked_up'])->count(),
            'last_calculated_at' => $now,
        ]);

        static::where('stat_key', 'total_customers')->update([
            'stat_value' => (string) Customer::where('is_active', true)->count(),
            'last_calculated_at' => $now,
        ]);

        static::where('stat_key', 'total_service_categories')->update([
            'stat_value' => (string) ServiceCategory::where('is_active', true)->count(),
            'last_calculated_at' => $now,
        ]);
    }
}
