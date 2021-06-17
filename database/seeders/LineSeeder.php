<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $line = new Line();
        $line->name = "Orden de Compra";
        $line->abrev = "O/C";
        $line->save();

        $line2 = new Line();
        $line2->name = "Orden de Servicio";
        $line2->abrev = "O/S";
        $line2->save();
    }
}
