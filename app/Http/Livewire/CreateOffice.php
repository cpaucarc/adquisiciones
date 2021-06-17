<?php

namespace App\Http\Livewire;

use App\Models\Office;
use Livewire\Component;

class CreateOffice extends Component
{
    public $office, $execution_days;

    protected $rules = [
        'office' => 'required',
        'execution_days' => 'required',
    ];

    public function save()
    {
        $this->validate();

        $off = new Office();
        $off->office = $this->office;
        $off->execution_days = $this->execution_days;
        $off->save();

//        return redirect()->to('/');
    }


    public function render()
    {
        return view('livewire.create-office');
    }
}
