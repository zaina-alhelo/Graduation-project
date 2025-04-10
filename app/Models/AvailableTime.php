<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableTime extends Model
{
    use HasFactory;
     protected $fillable = [
        'doctor_id', 'day_of_week', 'start_time', 'end_time'
    ];
    public function doctor()
{
    return $this->belongsTo(User::class, 'doctor_id');
}

}
