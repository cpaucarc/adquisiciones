<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'office', 'execution_days'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

}
