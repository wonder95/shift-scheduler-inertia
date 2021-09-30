<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Station;
use App\Models\User;

class Shift extends Model
{
    use HasFactory;

    protected $fillable=['date', 'user_id', 'station_id', 'am_pm'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
