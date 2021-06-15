<?php

namespace Database\Seeders;

use App\Models\DocumentStatus;
use Illuminate\Database\Seeder;

class DocumentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $st = new DocumentStatus();
        $st->name = "Falta firma";
        $st->save();

        $st1 = new DocumentStatus();
        $st1->name = "Falta perfeccionamiento";
        $st1->save();

        $st2 = new DocumentStatus();
        $st2->name = "Falta visacion";
        $st2->save();

        $st3 = new DocumentStatus();
        $st3->name = "Falta Verificacion";
        $st3->save();

        $st4 = new DocumentStatus();
        $st4->name = "V°B°";
        $st4->save();

        $st5 = new DocumentStatus();
        $st5->name = "En espera";
        $st5->save();

    }
}
