<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $names = array("Frank", "Angel", "Jean", "Diane", "Stefan", "Tim");


    public function render()
    {
        return view('livewire.navbar');
    }
}
