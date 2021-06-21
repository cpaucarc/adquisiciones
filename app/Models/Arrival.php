<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrival extends Model
{
    use HasFactory;

    protected $fillable = [
        'arrival_date',
        'origin',
        'destination',
        'log_contract_status_id',
        'attention_status_id',
        'feedback'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function originOffice()
    {
        return $this->hasOne('App\Models\Office', 'id', 'origin');
    }

    public function destinationOffice()
    {
        return $this->hasOne('App\Models\Office', 'id', 'destination');
    }
}
