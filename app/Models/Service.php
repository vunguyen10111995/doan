<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'description',
        'sale_percent',
        'image',
        'sale_from',
        'sale_end',
        'note',
        'status',
        'url',
    ];

    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'service_id');
    }


    public function address()
    {
        return $this->hasMany(Address::class, 'service_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function scopeGetUser($query, $value)
    {
        return $query->find($value)->with('user')->get();
    }

    public function scopeGetSameCategory($query, $value)
    {
        return $query->where('category_id', $value)->limit(6)->get();
    }

    public function scopeWhereUser($query, $value)
    {
        return $query->where('user_id', $value)->with('address');
    }
}
