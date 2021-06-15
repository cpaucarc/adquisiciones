<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $office = new Office();
        $office->office = "Dirección de Abastecimientos y Servicios Auxiliares";
        $office->execution_days = 3;
        $office->save();

        $office2 = new Office();
        $office2->office = "Unidad de Adquisiciones";
        $office2->execution_days = 4;
        $office2->save();
    }
}
