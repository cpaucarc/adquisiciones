<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('contracts.index');
    }

    public function create()
    {
        return view('contracts.create');
    }

    public function show($id)
    {
        $contract = Contract::find($id);
        if ($contract) {
            return view('contracts.show')
                ->with(compact('contract'));
        } else {
            return redirect()->route('contratos');
        }
    }
}
