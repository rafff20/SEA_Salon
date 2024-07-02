<?php
// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:20',
            'date' => 'required|date',
            'time' => 'required',
            'service' => 'required|string',
            'message' => 'nullable|string',
        ]);

        // Create reservation
        Reservation::create([
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'service' => $request->service,
            'datetime' => $request->date . ' ' . $request->time,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Appointment booked successfully!');
    }
}
