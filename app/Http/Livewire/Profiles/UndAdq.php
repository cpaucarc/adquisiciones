<?php

namespace App\Http\Livewire\Profiles;

use App\Models\Arrival;
use App\Models\LogContractStatus;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UndAdq extends Component
{
    public function render()
    {

//        $contracts = DB::table('contracts')
//            ->whereIn('id', function ($query) {
//                $query->select('contract_id')
//                    ->from(with(new LogContractStatus)->getTable())
//                    ->whereIn('id', function ($q) {
//                        $q->select('log_contract_status_id')
//                            ->from(with(new Arrival)->getTable())
//                            ->where('destination', 2);
//                    })
//                    ->where('status', 0);
//            })->get();

//        $logs = DB::table('log_contract_statuses')
//            ->whereIn('id', function ($query) {
//                $query->select('log_contract_status_id')
//                    ->from(with(new Arrival)->getTable())
//                    ->where('destination', 2);
//            })
//            ->where('status', 0)
//            ->get();


//        return view('livewire.profiles.und-adq')
//            ->with(compact('logs'));

        return view('home');
    }
}
