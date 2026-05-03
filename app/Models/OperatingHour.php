<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperatingHour extends Model
{
    protected $table = 'operating_hours';

    protected $fillable = [
        'day_of_week', 'day_name', 'open_time',
        'close_time', 'is_closed', 'note',
    ];

    protected $casts = [
        'is_closed' => 'boolean',
        'day_of_week' => 'integer',
    ];

    public function getHoursAttribute(): string
    {
        if ($this->is_closed) {
            return 'Tutup';
        }

        $open  = substr($this->open_time, 0, 5);
        $close = substr($this->close_time, 0, 5);

        return "{$open} - {$close}";
    }
}
