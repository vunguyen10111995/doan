<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "address";

    protected $fillable = [
        'service_id',
        'image',
        'description',
        'name_address',
        'telephone',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function scopeWhereService($query, $value)
    {
        return $query->where('service_id', $value)->get();
    }
}
