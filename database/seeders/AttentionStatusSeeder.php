<?php

namespace Database\Seeders;

use App\Models\AttentionStatus;
use Illuminate\Database\Seeder;

class AttentionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $atst = new AttentionStatus();
        $atst->name = "No es urgente";
        $atst->percent = "40";
        $atst->save();

        $atst1 = new AttentionStatus();
        $atst1->name = "Ya casi es urgente";
        $atst1->percent = "30";
        $atst1->save();

        $atst2 = new AttentionStatus();
        $atst2->name = "Urgente";
        $atst2->percent = "30";
        $atst2->save();
    }
}
