<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use App\Models\Document;
use App\Models\Line;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateContract extends Component
{

    use WithFileUploads;

    public $name, $description;
    public $price, $line_id, $document;
    public $due_at;
    public $lines;

    protected $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    public function mount()
    {
        $line = Line::all();
        $this->lines = $line;
    }


    public function save()
    {
        $this->validate();

        $fileName = $this->document->getClientOriginalName();
        if (!$fileName) {
            $fileName = "Archivo adjunto";
        }
        $file = $this->document->store('documentos');
        $user_id = 1;
        $contract = Contract::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'line_id' => $this->line_id,
            'due_at' => $this->due_at,
        ]);

        if ($contract) {
            Document::create([
                'link' => $file,
                'name' => $fileName,
                'user_id' => $user_id,
                'contract_id' => $contract->id
            ]);
        }

        if ($this->line_id) {
            dd([
                'contract_name' => $this->name,
                'contract_description' => $this->description,
                'contract_price' => $this->price,
                'contract_line' => $this->line_id,
                'contract_document' => $this->document,
            ]);
        } else {
            dd([
                'msg' => 'No hay Line',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.create-contract');
    }
}
