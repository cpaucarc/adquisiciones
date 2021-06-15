<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'due_date_at', 'due_time_at', 'line_id',
    ];

    protected $hidden = [
        'accepted_at', 'created_at', 'updated_at',
    ];
}
