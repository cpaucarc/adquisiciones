<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogContractStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id', 'contract_status_id', 'status'
    ];

    public function document()
    {
        return $this->hasOne('App\Models\Document', 'log_contract_status_id', 'id');
    }

    public function statusContract()
    {
        return $this->hasOne('App\Models\ContractStatus', 'id', 'contract_status_id');
    }

    public function arrival()
    {
        return $this->hasOne('App\Models\Arrival', 'log_contract_status_id', 'id');
    }

}
