<?php

use Illuminate\Database\Seeder;

class SituacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situacoes')->insert([ 'nome' => 'Pendente', ]);
        DB::table('situacoes')->insert([ 'nome' => 'Enviado', ]);
        DB::table('situacoes')->insert([ 'nome' => 'Entregue', ]);
    }
}
