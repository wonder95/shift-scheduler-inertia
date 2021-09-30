<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Shift;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Station;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    public function index()
    {
        return Inertia::render('Shifts/Index', [
           'shifts' => Shift::with('user', 'station')->get()
        ]);
    }

    public function calendar()
    {
         $now = Carbon::now();
         $currYear = $now->year;
         $currMonth = $now->month;

         $newMonth = request('newMonth');
         $newYear = request('newYear');

         $queryYear = $newYear ?: $currYear;
         $queryMonth = $newMonth ?: $currMonth;

         $monthShifts = Shift::where(DB::raw('MONTH(date)'), $queryMonth)
             ->where(DB::raw('YEAR(date)'), $queryYear)
             ->with('user', 'station')
             ->get()
             ->groupBy(['date', 'am_pm', 'station.station_number']);


         // We also need a list of the stations.
        $stations = Station::all();

        return Inertia::render('Shifts/CalendarMonth', [
            'shifts' => $monthShifts,
            'stations' => $stations
        ]);
    }

    public function create()
    {
        return Inertia::render('Shifts/Create', [
            'users' => User::all(),
            'stations' => Station::all()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'user_id' => ['required'],
            'date' =>  ['required'],
            'station_id' => ['required'],
            'am_pm' => ['required']
        ]);

        Shift::create($attributes);

        return Redirect::route('shifts.index')->with('success', 'Your shift has been created');
    }

    public function delete(Shift $shift)
    {
        $shift->delete();

        return Redirect::back()->with('success', 'Shift deleted.');
    }
}
