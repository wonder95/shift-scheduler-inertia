<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\User;
use App\Models\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::all()->where('status', 1)->map(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'type' => $user->type,
                    'status' => $user->status,
                    'isAdmin' => $user->isAdmin(),
                    'isSupport' => $user->isSupport(),
                    'isSuppression' => $user->isSuppression(),
                ]),
        ]);
    }

    public function userList()
    {
        return User::all();
    }

    public function create()
    {
        return Inertia::render('Users/CreateJS', [
            'users' => User::all(),
            'stations' => Station::all(),
        ]);
    }

    public function store(Request $request)
    {

        //dd ($request);
        // Create User
        $user = User::create([
            'name' => request('name'),
            'type' => request('type'),
            'email' => request('email'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        $user->contact()->create([
            'user_id' => $user->id,
            'personal_email' => request('personal_email'),
            'primary_phone' => request('primary_phone'),
            'secondary_phone' => request('secondary_phone'),
            'address' => request('address'),
            'city' => request('city'),
            'state' => request('state'),
            'zip' => request('zip'),
        ]);

        $user->certs()->create([
            'user_id' => $user->id,
            'emt_type' => request('emt_type'),
            'sr_ff' => request('sr_ff'),
            'driver' => request('driver'),
            'ao' => request('ao'),
            'wto' => request('wto'),
        ]);

        return Redirect::route('users.index')->with('success', 'User created.');
    }
}
