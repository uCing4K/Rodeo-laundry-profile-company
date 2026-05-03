<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $table = 'page_contents';

    protected $fillable = [
        'page', 'section', 'content_key',
        'content_value', 'content_type', 'description',
    ];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        $content = static::where('content_key', $key)->first();
        return $content?->content_value ?? $default;
    }

    public static function forPage(string $page): array
    {
        return static::where('page', $page)
            ->pluck('content_value', 'content_key')
            ->toArray();
    }

    public function getJsonValueAttribute(): array
    {
        if ($this->content_type === 'json' && $this->content_value) {
            return json_decode($this->content_value, true) ?? [];
        }
        return [];
    }

    public function scopeForPage($query, string $page)
    {
        return $query->where('page', $page);
    }

    public function scopeForSection($query, string $section)
    {
        return $query->where('section', $section);
    }
}
