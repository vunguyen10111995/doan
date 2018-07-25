<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingService extends Model
{
    protected $table = "tracking_services";

    protected $fillable = [
        "date",
        "total_services"
    ];
}
