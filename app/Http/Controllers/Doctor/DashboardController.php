<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            $date = Carbon::today();
            break;
        case 'month':
            $date = Carbon::now()->startOfMonth();
            break;
        case 'year':
        default:
            $date = Carbon::now()->startOfYear();
            break;
    }

    // جلب عدد المستخدمين الذين لديهم دور 'user'
    $userCount = User::where('role', 'user')
                     ->whereDate('created_at', '>=', $date)
                     ->count();

    // جلب عدد الأطباء الذين لديهم دور 'doctor'
    $doctorCount = User::where('role', 'doctor')
                       ->whereDate('created_at', '>=', $date)
                       ->count();

    return view('doctor.dashboard', compact('userCount', 'doctorCount', 'filter'));
}

}
