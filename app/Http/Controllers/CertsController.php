<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CertsController extends Controller
{

    public function user() {
        return $this->belongsTo(User::class);
    }
}
