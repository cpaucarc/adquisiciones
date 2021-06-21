<?php

namespace App\Http\Livewire\Partial;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $userLogged = "Usuario no logeado";
    public $officeLogged = null;
    public $firstLetter = "?";

    public function render()
    {
        if (Auth::check()) {
            $this->userLogged = Auth::user()->person->lastname . " " . Auth::user()->person->name;
            $this->officeLogged = Auth::user()->office->office;
            $this->firstLetter = strtoupper(substr(Auth::user()->person->lastname, 0, 1));
        }
        return view('livewire.partial.navbar');
    }
}
