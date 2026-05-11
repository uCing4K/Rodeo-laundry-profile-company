<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperatingHour extends Model
{
    protected $table = 'operating_hours';

    protected $fillable = [
        'day', 'open_time', 'closed_time', 'is_closed',
    ];

    protected $casts = [
        'is_closed' => 'boolean',
    ];

    public function getHoursAttribute(): string
    {
        if ($this->is_closed) {
            return 'Tutup';
        }

        $open  = substr($this->open_time, 0, 5);
        $close = substr($this->closed_time, 0, 5);

        return "{$open} - {$close}";
    }
}
