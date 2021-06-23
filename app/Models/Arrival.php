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
        'contract_id',
        'status_id',
        'status',
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

    public function arrivalStatus()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    public function document()
    {
        return $this->hasOne('App\Models\Document', 'arrival_id', 'id');
    }

}
