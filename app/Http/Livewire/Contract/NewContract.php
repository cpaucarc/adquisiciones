<?php

namespace App\Http\Livewire\Contract;

use App\Models\Arrival;
use App\Models\Contract;
use App\Models\Document;
use App\Models\Line;
use App\Models\LogContractStatus;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewContract extends Component
{
    use WithFileUploads;

    public $name, $description, $price, $line_id, $due_date_at, $feedback;
    public $document;
    public $dga;
    public $lines;
    public $response;

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
        $this->lines = Line::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        if (auth()->check()) {
            //TODO: validar formulario
            $this->validate();
            //3: No es conforme (a DGA), 2: Si es conforme(a Und de Adquisiciones)
            $destination = $this->dga === 'on' ? 3 : 2;
            $origin = 1; //Oficina Actual: DASA

            //TODO: copiar archivo a la carpeta 'storage/app/public'
            $fileName = $this->document->getClientOriginalName();
            if (!$fileName) {
                $fileName = "Archivo adjunto";
            }
//            $file = $this->document->store('public');
            $file = $this->document->storeAs('public', $fileName);

            //TODO: Guardar info del Contract en la BD, y recuperar instancia para uso posterior
            $contract = $this->saveContract($origin, $destination);

            //TODO: Guardar en Arrival
            $arrivalSaved = null;
            if ($contract) {
                $arrivalSaved = Arrival::create([
                    'origin' => $origin,
                    'destination' => $destination,
                    'contract_id' => $contract->id,
                    'status_id' => 4, //4:Falta verificacion
                ]);

                if ($destination === 3) { //3: No es conforme
                    $arrivalSaved->feedback = $this->feedback;
                    $arrivalSaved->save();
                }
            }

            //TODO: Guardar info del Document en la BD
            $documentSaved = null;
            if ($arrivalSaved) {
                $documentSaved = Document::create([
                    'name' => $fileName,
                    'user_id' => Auth::user()->id,
                    'arrival_id' => $arrivalSaved->id
                ]);
            }

            //TODO: Redireccionar a la ruta de vista de este contrato
//            return redirect()->route('contratos');
            $this->response = $contract;

        } else {
            return redirect()->route('login');
        }
    }

    protected function saveContract($origin, $destination)
    {
        try {
            return Contract::create([
                'name' => trim($this->name),
                'description' => trim($this->description),
                'price' => $this->price,
                'due_date_at' => $this->due_date_at,
                'due_time_at' => date("h:i:s"),//current server time
                'origin' => $origin,
                'destination' => $destination,
                'line_id' => $this->line_id,
                'status_id' => 13, //13: En espera
            ]);
        } catch (QueryException $ex) {
            dd($ex->getMessage());
            return null;
        }
    }

    public function render()
    {
        return view('livewire.contract.new-contract');
    }
}
