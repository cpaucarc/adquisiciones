<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'link', 'name', 'user_id', 'contract_id',
    ];

    protected $hidden = [
        'accepted_at', 'created_at', 'updated_at',
    ];

}
