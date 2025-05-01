<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
{
    $user = Auth::user();
  if ($user->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role == 'doctor') {
        return redirect()->route('doctor.dashboard');
    } elseif ($user->role == 'user') {
        return redirect()->route('home');
    } else {
           return redirect('/');
    }
}
}