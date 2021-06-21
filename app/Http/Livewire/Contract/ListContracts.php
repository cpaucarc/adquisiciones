<?php

namespace App\Http\Livewire\Contract;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListContracts extends Component
{
    use WithPagination;

    public $search;
    public $sort = 'created_at';
    public $direction = 'desc';
    public $cant = 10;

    public function mount()
    {

    }

    public function render()
    {
        $contracts = DB::table('contracts as ct')
            ->join('lines as ln', 'ln.id', '=', 'ct.line_id')
            ->join('contract_statuses as ctst', 'ctst.id', '=', 'ct.contract_status_id')
            ->select('ct.id', 'ct.name', 'ct.description', 'ct.price', 'ln.name as line', 'ln.abrev', 'ctst.name as status', 'ctst.color')
            ->selectRaw('date_format(ct.created_at, "%h:%i %p del %d-%m-%Y") as created_at')
            ->where('ct.name', 'like', '%' . $this->search . '%')
            ->orWhere('ln.name', 'like', '%' . $this->search . '%')
            ->orWhere('ctst.name', 'like', '%' . $this->search . '%')
            ->orWhere('ct.created_at', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);

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

    public function updatingSearch()
    {
        /*
         * Esto soluciona el error de buscar cuando estamos en la pagina 'n' y no encuentra
         * ningun registro, este metodo solo se aplicara a la propiedad $search.
         * Mas info: ver Ciclo de vida de Livewire (Hooks)
         */
        $this->resetPage();
    }

    public function updatingCant()
    {
        $this->resetPage();
    }
}
