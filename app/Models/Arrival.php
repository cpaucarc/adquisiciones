<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrival extends Model
{
    use HasFactory;

    protected $fillable = [
        'arrival_date', 'origin', 'destination', 'document_id', 'attention_status_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

}
