<?php

namespace App\Models\app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'start_time',
        'end_time',
        'appointment_date',
        'notes'
    ];

    public function doctorName()
    {
        return $this->belongsTo(Users::class,'doctor_id');
    }

    public function specialty()
    {
        return $this->belongsTo(DoctorProfiles::class,'doctor_id');
    }

    public function patientName()
    {
        return $this->belongsTo(Users::class,'patient_id');
    }

}
