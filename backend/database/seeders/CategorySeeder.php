<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Alta prioridade',
                'color' => '#D91111',
            ],
            [
                'name' => 'Média prioridade',
                'color' => '#DDD511',
            ],
            [
                'name' => 'Baixa prioridade',
                'color' => '#86A7FA',
            ],
        ]);
    }
}
