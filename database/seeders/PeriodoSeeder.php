<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodo')->insert(['nombre'=>'Dia','tam_maximo'=>90000]);
        DB::table('periodo')->insert(['nombre'=>'Mes','tam_maximo'=>31]);
        DB::table('periodo')->insert(['nombre'=>'Años','tam_maximo'=>12]);
    }
}
