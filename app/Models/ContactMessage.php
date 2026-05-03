<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $table = 'contact_messages';

    protected $fillable = [
        'name', 'phone', 'email', 'subject', 'message',
        'message_type', 'is_read', 'is_replied',
        'replied_at', 'admin_notes',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_replied' => 'boolean',
        'replied_at' => 'datetime',
    ];

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeUnreplied($query)
    {
        return $query->where('is_replied', false);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('message_type', $type);
    }
}
