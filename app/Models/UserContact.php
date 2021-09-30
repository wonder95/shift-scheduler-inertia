<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'personal_email',
        'primary_phone',
        'secondary_phone',
        'address',
        'city',
        'state',
        'zip',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
