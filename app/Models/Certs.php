<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'emt_type',
        'sr_ff',
        'driver',
        'ao',
        'wto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
