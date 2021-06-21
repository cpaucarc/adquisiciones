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

        $office3 = new Office();
        $office3->office = "Dirección General de Administración";
        $office3->execution_days = 4;
        $office3->save();

        $office4 = new Office();
        $office4->office = "Unidad de Procesos de Selección";
        $office4->execution_days = 4;
        $office4->save();

        $office5 = new Office();
        $office5->office = "Unidad de Servicios Auxiliares";
        $office5->execution_days = 4;
        $office5->save();

        $office6 = new Office();
        $office6->office = "Oficina de Asesoria Jurídica";
        $office6->execution_days = 4;
        $office6->save();

        $office7 = new Office();
        $office7->office = "Unidad de Almacén Central";
        $office7->execution_days = 4;
        $office7->save();

        $office8 = new Office();
        $office8->office = "Dirección de Gestión Financiera";
        $office8->execution_days = 4;
        $office8->save();

        $office9 = new Office();
        $office9->office = "Titular del pliego";
        $office9->execution_days = 4;
        $office9->save();
    }
}
