<?php

// DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->orderBy('datetime', 'desc')->get();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'user' => $user,
            'reservations' => $reservations,
        ]);
    }
}
