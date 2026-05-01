<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;

    // Bazaya yazılmasına icazə verilən sütunlar
    protected $fillable = ['name', 'email', 'phone', 'level', 'message'];
}