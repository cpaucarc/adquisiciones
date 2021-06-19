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

    protected $listeners = [
        'showMessage'
    ];

    public $info;

    public function save()
    {
        $this->validate();

        $off = new Office();
        $off->office = $this->office;
        $off->execution_days = $this->execution_days;
        $off->save();

        $this->emit('showM');

//        return redirect()->to('/');
    }

    public function showMessage()
    {
//        dd($message1, $message2);
//        session()->flash('message', 'Post successfully updated.');
        $this->info = "Mensage " . rand(0, 78);
    }

    public function render()
    {
        return view('livewire.create-office');
    }
}
