<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'year'); // default to 'This Year'

        switch ($filter) {
            case 'today':
                $startDate = Carbon::today();
                $endDate = Carbon::today();
                break;
            case 'month':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'year':
            default:
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
        }

        $userCount = User::where('role', 'user')
                         ->whereBetween('created_at', [$startDate, $endDate])
                         ->count();

        $doctorCount = User::where('role', 'doctor')
                           ->whereBetween('created_at', [$startDate, $endDate])
                           ->count();

        $appointments = Appointment::with('patient')
                                   ->whereBetween('date', [$startDate, $endDate])
                                   ->get();
 $chartLabels = [];
    $chartData = [];

    for ($i = 6; $i >= 0; $i--) {
        $date = Carbon::now()->subDays($i)->format('Y-m-d');
        $chartLabels[] = $date;
        $chartData[] = Appointment::whereDate('date', $date)->count();
    }

    return view('doctor.dashboard', compact(
        'filter', 'userCount', 'doctorCount', 'appointments',
        'chartLabels', 'chartData'
    ));
    }
}
