<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailableTimeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAppointmentController;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('landing.home');
})->name('home');



// Routes requiring authentication
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('user.profile');
});



// Admin Dashboard
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Doctor Dashboard
    Route::middleware(['auth', 'verified', 'role:doctor'])->prefix('doctor')->group(function () {
       
    // Doctor Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Doctor\DashboardController::class, 'index'])->name('doctor.dashboard');

    // Manage Doctor's Available Times
    Route::resource('available_times', AvailableTimeController::class);
// Appointment Management
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::patch('doctor/appointments/{id}/update-status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
Route::patch('/appointments/{id}/note', [AppointmentController::class, 'updateNote'])->name('appointments.updateNote');
Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');

    // API Routes
    Route::get('appointments/available-times/{doctorId}/{dayName}', [AppointmentController::class, 'getAvailableTimes'])
        ->name('appointments.availableTimes');
        
    Route::get('appointments/fully-booked-dates/{doctorId}', [AppointmentController::class, 'getFullyBookedDates'])
        ->name('appointments.fullyBookedDates');
    Route::get('patient/create', [PatientController::class, 'create'])->name('patients.create'); // Show patient registration form
    Route::post('patient', [PatientController::class, 'store'])->name('patients.store');         // Store new patient

Route::get('/messages/{user}', [MessageController::class, 'index'])->name('message.index');
    Route::post('/messages/{user}/send', [MessageController::class, 'send'])->name('message.send');
    Route::post('/messages/{user}/mark-read', [MessageController::class, 'markAsRead'])->name('message.mark-read');
    Route::get('/messages/unread-count', [MessageController::class, 'getUnreadCount'])->name('message.unread-count');
    
    // New route for checking read status of messages
    Route::get('/messages/{user}/check-read-status', [MessageController::class, 'checkReadStatus'])->name('message.check-read-status');
});


// Patient Dashboard
Route::middleware(['auth', 'verified', 'role:user'])->prefix('patient')->group(function () {
    Route::get('/dashboard', function () {
        return view('patient.dashboard');
    })->name('patient.dashboard');
});



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verify', function (Request $request) {
    $request->validate([
        'verification_code' => 'required|string|size:6'
    ]);
    
    $user = $request->user();

    if ($user->verifyCode($request->verification_code)) {
        $user->markEmailAsVerified();
        $user->verification_code = null; 
        $user->verification_code_expires_at = null; 
        $user->save();
        
        return redirect('/dashboard')->with('status', 'Email confirmed successfully');
    }
    
    return back()->with('error', 'Invalid verification code');
})->middleware('auth')->name('verification.verify');
Route::get('/register', function () {
    if (Auth::check()) {
        return view('auth.register');
    }
    
    return view('auth.register');
})->name('register');
Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return response()->json(['message' => 'Verification code has been sent!']);
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


// Google login routes
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Conversation routes
// Route::post('/send-message', [MessageController::class, 'sendMessage']);
// Route::middleware(['auth'])->group(function () {
//     Route::get('/conversations/create', [ConversationController::class, 'create'])->name('conversations.create');
//     Route::post('/conversations', [ConversationController::class, 'store'])->name('conversations.store');
//     Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
//     // Route::post('/conversations/{conversation}/messages', [MessageController::class, 'store'])->name('messages.store');
// });

// Route::post('/chat/{conversation_id}/send', [ChatController::class, 'sendMessage'])->name('sendMessage');





//Routs of Landing page 
Route::get('/faq', function () {
    return view('landing.faq');
})->name('faq');

Route::get('/about-us', function () {
    return view('landing.about-us');
})->name('about-us');

Route::get('/pricing', function () {
    return view('landing.pricing');
})->name('pricing');

Route::get('/appointment', function () {
    return view('landing.appointment');
})->name('appointment');

Route::get('/service', function () {
    return view('landing.service');
})->name('service');

Route::get('/service-details', function () {
    return view('landing.service-details');
})->name('service-details');

Route::get('/contact', function () {
    return view('landing.contact');
})->name('contact');

Route::get('/blog', function () {
    return view('landing.blog');
})->name('blog');

Route::get('/blog-details', function () {
    return view('landing.blog-details');
})->name('blog-details');

Route::get('/doctor', function () {
    return view('landing.doctor');
})->name('doctor');



Route::get('/portfolio', function () {
    return view('landing.portfolio');
})->name('portfolio');

Route::get('/portfolio-details', function () {
    return view('landing.portfolio-details');
})->name('portfolio-details');

Route::get('/chatbot', function () {
    return view('landing.chatbot');
})->name('chatbot');

Route::get('/drAnas', function () {
    return view('landing.drAnas');
})->name('drAnas');

Route::get('/drYousef', function () {
    return view('landing.drYousef');
})->name('drYousef');

Route::get('/drAhmad', function () {
    return view('landing.drAhmad');
})->name('drAhmad');

Route::get('/drKhaled', function () {
    return view('landing.drKhaled');
})->name('drKhaled');

Route::get('/drNoor', function () {
    return view('landing.drNoor');
})->name('drNoor');

Route::get('/drRami', function () {
    return view('landing.drRami');
})->name('drRami');

//   Route::get('/appointment-view', function () {
//     return view('landing.appointment');
// })->name('appointment.view');

    Route::get('/appointment', [App\Http\Controllers\UserAppointmentController::class, 'showAppointmentForm'])->name('appointments.form');
    Route::post('/appointments/store', [App\Http\Controllers\UserAppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/available-times/{doctorId}/{dayName}', [App\Http\Controllers\UserAppointmentController::class, 'getAvailableTimes']);
    Route::get('/appointments/fully-booked-dates', [App\Http\Controllers\UserAppointmentController::class, 'getFullyBookedDates']);
    // Route::get('/appointments/all-doctors-times/{dayName}', [App\Http\Controllers\UserAppointmentController::class, 'getAllDoctorsAvailableTimes']);


