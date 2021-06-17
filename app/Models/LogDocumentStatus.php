<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogDocumentStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_status_id', 'document_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
