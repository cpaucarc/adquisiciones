<?php

namespace Database\Seeders;

use App\Models\ContractStatus;
use Illuminate\Database\Seeder;

class ContractStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $st1 = new ContractStatus();
        $st1->name = "Falta firma";
        $st1->color = "yellow";
        $st1->save();

        $st2 = new ContractStatus();
        $st2->name = "Falta perfeccionamiento";
        $st2->color = "yellow";
        $st2->save();

        $st3 = new ContractStatus();
        $st3->name = "Falta visacion";
        $st3->color = "yellow";
        $st3->save();

        $st4 = new ContractStatus();
        $st4->name = "Falta Verificacion";
        $st4->color = "yellow";
        $st4->save();

        $st5 = new ContractStatus();
        $st5->name = "V°B°";
        $st5->color = "green";
        $st5->save();

        $st6 = new ContractStatus();
        $st6->name = "Firmado";
        $st6->color = "yellow";
        $st6->save();

        $st7 = new ContractStatus();
        $st7->name = "Falta V°B°";
        $st7->color = "yellow";
        $st7->save();

        $st8 = new ContractStatus();
        $st8->name = "Falta Conformidad";
        $st8->color = "yellow";
        $st8->save();

        $st9 = new ContractStatus();
        $st9->name = "Requiere 1° Convocatoria";
        $st9->color = "yellow";
        $st9->save();

        $st10 = new ContractStatus();
        $st10->name = "Requiere 2° Convocatoria";
        $st10->color = "yellow";
        $st10->save();

        $st11 = new ContractStatus();
        $st11->name = "Requiere 2° Convocatoria";
        $st11->color = "yellow";
        $st11->save();

        $st12 = new ContractStatus();
        $st12->name = "Rechazado";
        $st12->color = "red";
        $st12->save();

        $st13 = new ContractStatus();
        $st13->name = "En espera";
        $st13->color = "yellow";
        $st13->save();
    }
}
