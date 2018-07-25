<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'follower_id',
        'following_id',
    ];

    public function followerUser()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    public function followingUser()
    {
        return $this->belongsTo(User::class, 'following_id');
    }
}
