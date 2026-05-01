<?php

namespace App\Models\app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrCategories extends Model
{
    use HasFactory;
    protected $table = 'dr_categories';

    protected $casts = [
        'is_selected' => 'boolean',
    ];
}
