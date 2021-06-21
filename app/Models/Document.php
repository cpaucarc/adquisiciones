<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'link', 'name', 'user_id', 'log_contract_status_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function creator()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
