@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Admin Dashboard</div>
    <div class="card-body">
        <h5 class="card-title">Welcome, {{ Auth::user()->name }}!</h5>
        <p class="card-text">This is the admin dashboard.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Management</h5>
                        <p class="card-text">Manage all users in the system</p>
                        <a href="#" class="btn btn-primary">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Doctor Management</h5>
                        <p class="card-text">Manage all doctors in the system</p>
                        <a href="#" class="btn btn-primary">Manage Doctors</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">System Settings</h5>
                        <p class="card-text">Modify system settings</p>
                        <a href="#" class="btn btn-primary">System Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
