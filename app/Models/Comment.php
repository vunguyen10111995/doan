<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'service_id',
        'user_id',
        'content'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeGetComment($query, $value)
    {
        return $query->orderBy('created_at', 'desc')->Where('service_id', $value)->with('user')->get();
    }
}
