<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $names = array("Frank", "Angel", "Jean", "Diane", "Stefan", "Tim");
    public $name = null;

    public function amount()
    {
        $this->name = $this->names[rand(0, count($this->names) - 1)];
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
