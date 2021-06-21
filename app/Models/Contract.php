<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name', 'description', 'price', 'due_date_at', 'due_time_at', 'line_id', 'contract_status_id',
    ];

    protected $hidden = [
        'accepted_at', 'created_at', 'updated_at',
    ];

    public function line()
    {
        return $this->hasOne('App\Models\Line', 'id', 'line_id');
    }

    public function logs()
    {
        return $this->hasMany('App\Models\LogContractStatus')
            ->orderBy('created_at', 'asc');
    }

    public function status()
    {
        return $this->hasOne('App\Models\ContractStatus', 'id', 'contract_status_id');
    }

}
