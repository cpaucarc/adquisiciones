<?php

namespace App\Http\Livewire\Contract;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListContracts extends Component
{
    public $search;
    public $sort = 'ct.created_at';
    public $direction = 'desc';

    public function mount()
    {

    }

    public function render()
    {
        $contracts = DB::table('contracts as ct')
            ->join('adquisiciones.lines as ln', 'ln.id', '=', 'ct.line_id')
            ->join('contract_statuses as ctst', 'ctst.id', '=', 'ct.contract_status_id')
            ->select('ct.id', 'ct.name', 'ct.description', 'ct.price', 'ln.name as line', 'ln.abrev as abrev', 'ctst.id as status_id', 'ctst.name as status', 'ctst.color as color')
            ->selectRaw('date_format(ct.created_at, "%h:%i %p del %d-%m-%Y") as created_at')
            ->where('ct.name', 'like', '%' . $this->search . '%')
            ->orWhere('ln.name', 'like', '%' . $this->search . '%')
            ->orWhere('ctst.name', 'like', '%' . $this->search . '%')
            ->orWhere('ct.created_at', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();

        return view('livewire.contract.list-contracts')
            ->with(compact('contracts'));
    }

    public function sortBy($sort)
    {
        if ($this->sort === $sort) {
            $this->direction = $this->direction === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
