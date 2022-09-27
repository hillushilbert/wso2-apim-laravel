<?php

namespace Database\Seeders;

use App\Models\Treinamento;
use Illuminate\Database\Seeder;

class TreinamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Treinamento::where('id','<>',0)->delete();
        //
        $treinamentos = [
            [
                'nome' => 'Laravel',
                'descricao' => 'Treinamento de Laravel',
                'ativo' => 1
            ],
            [
                'nome' => 'WSO2 API Mananger',
                'descricao' => '',
                'ativo' => 1
            ],
            [
                'nome' => 'WSO2 Integrator',
                'descricao' => '',
                'ativo' => 1
            ],
            [
                'nome' => 'PHP',
                'descricao' => 'Linguagem PHP do Básico ao Avançado',
                'ativo' => 1
            ],
        ];

        foreach($treinamentos as $treinamento)
        {
            Treinamento::create($treinamento);
        }
    }
}
