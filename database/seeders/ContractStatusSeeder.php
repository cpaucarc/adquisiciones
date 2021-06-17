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
        $st = new ContractStatus();
        $st->name = "Aceptado";
        $st->color = "green";
        $st->save();

        $st1 = new ContractStatus();
        $st1->name = "En espera";
        $st1->color = "yellow";
        $st1->save();

        $st2 = new ContractStatus();
        $st2->name = "Rechazado";
        $st2->color = "red";
        $st2->save();
    }
}
