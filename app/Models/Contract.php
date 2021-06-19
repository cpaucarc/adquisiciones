<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'due_date_at', 'due_time_at', 'line_id', 'contract_status_id',
    ];

    protected $hidden = [
        'accepted_at', 'created_at', 'updated_at',
    ];

    public function status()
    {
        return $this->hasOne('App\Models\ContractStatus', 'id', 'contract_status_id');
    }

    public function line()
    {
        return $this->hasOne('App\Models\Line', 'id', 'line_id');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Document')->orderBy('created_at');
    }

}
