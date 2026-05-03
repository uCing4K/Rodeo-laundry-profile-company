<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $table = 'company_settings';

    protected $fillable = [
        'setting_key',
        'setting_value',
        'setting_group',
        'description',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('setting_key', $key)->first();
        return $setting?->setting_value ?? $default;
    }

    public static function group(string $group): array
    {
        return static::where('setting_group', $group)
            ->pluck('setting_value', 'setting_key')
            ->toArray();
    }

    public function scopeOfGroup($query, string $group)
    {
        return $query->where('setting_group', $group);
    }
}
