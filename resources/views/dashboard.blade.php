@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        <h5 class="card-title">Welcome, {{ Auth::user()->name }}!</h5>
        <p class="card-text">
            You are logged in as:
            @if(Auth::user()->isAdmin())
                <span class="badge bg-danger">Admin</span>
            @elseif(Auth::user()->isDoctor())
                <span class="badge bg-primary">Doctor</span>
            @else
                <span class="badge bg-success">Patient</span>
            @endif
        </p>
    </div>
</div>
@endsection
