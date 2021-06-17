<?php

namespace App\Http\Livewire;

use App\Models\Arrival;
use App\Models\Contract;
use App\Models\Document;
use App\Models\Line;
use App\Models\LogDocumentStatus;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateContract extends Component
{

    use WithFileUploads;

    public $name, $description, $price, $line_id, $due_date_at;
    public $document;
    public $dga;
    public $lines;

    protected $rules = [
        'name' => 'required|max:250',
        'description' => 'required|max:1000',
        'price' => 'required|gt:0|lt:100000000',
        'line_id' => 'required|gt:0',
        'due_date_at' => 'required',
        'document' => 'required',
    ];

    public function mount()
    {
        $line = Line::all();
        $this->lines = $line;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        //TODO: validar formulario
        $this->validate();

        //TODO: copiar archivo a la carpeta documentos
        $fileName = $this->document->getClientOriginalName();
        if (!$fileName) {
            $fileName = "Archivo adjunto";
        }
        $file = $this->document->store('documentos');

        //TODO: Guardar info del Contract en la BD, y recuperar instancia para uso posterior
        $contract = $this->saveContract();

        //TODO: Guardar info del Document en la BD
        $user_id = 1;
        if ($contract) {
            $documentSaved = Document::create([
                'link' => $file,
                'name' => $fileName,
                'user_id' => $user_id,
                'contract_id' => $contract->id
            ]);
        }

        //TODO: Guardar en LogDocumentStatus
        if (isset($documentSaved) and $documentSaved) {
            LogDocumentStatus::create([
                'document_status_id' => 6, // STATUS: En espera
                'document_id' => $documentSaved->id
            ]);
        }

        //TODO: Guardar en Arrival
        //3: No es conforme (a DGA), 2: Si es conforme(Und de Adquisiciones)
        $destination = $this->dga === 'on' ? 3 : 2;
        $origin = 1; //Oficina Actual: DASA

        if (isset($documentSaved) and $documentSaved) {
            Arrival::create([
                'origin' => $origin,
                'destination' => $destination,
                'document_id' => $documentSaved->id,
                'attention_status_id' => 1, //STATUS: No es urgente
            ]);
        }

        //TODO: Redireccionar a la ruta de vista de este contrato
        return redirect()->route('contratos');
    }

    protected function saveContract()
    {
        try {
            return Contract::create([
                'name' => trim($this->name),
                'description' => trim($this->description),
                'price' => $this->price,
                'line_id' => $this->line_id,
                'contract_status_id' => 2, //2: En espera
                'due_date_at' => $this->due_date_at,
                'due_time_at' => date("h:i:s"),//current server time
            ]);
        } catch (QueryException $ex) {
            dd($ex->getMessage());
            return false;
        }
    }

    protected function showRequestInfo()
    {
        if ($this->line_id) {
            if ($this->dga === 'on') { //NO ES CONFORME: enviar a DGA
                dd([
                    'contract_name' => $this->name,
                    'contract_description' => $this->description,
                    'contract_price' => $this->price,
                    'contract_line' => $this->line_id,
                    'contract_document' => $this->document,
                    'destino' => 'Se enviara a DGA',
                ]);
            } else { // SI ES CONFORME: enviar e unad
                dd([
                    'contract_name' => $this->name,
                    'contract_description' => $this->description,
                    'contract_price' => $this->price,
                    'contract_line' => $this->line_id,
                    'contract_document' => $this->document,
                    'destino' => 'Se enviara a UnAdq',
                ]);
            }


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
