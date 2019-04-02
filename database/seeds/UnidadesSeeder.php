<?php

use App\Models\mUnidades;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idorgano = DB::select('SELECT idorgano FROM organo 
        WHERE idorgano = ?', [1]);
        
        $idedificio = DB::select('SELECT idedificio FROM edificios 
        WHERE idedificio = ?', [2]);

        factory(mUnidades::class)->create([
            'nombre' => 'yaxer',
            'direccion' => 'Jr. Junin 159',
            'estado' => 1,
            'idorgano' => 1,
            'jefe_unidad' => 'Andre Baltazar',
            'secretaria' => 'Anais Baltazar',
            'hora_atencion' => '08:00am',
            'anexo' => '001',
            'email' => 'andre.hdc@gmail.com',
            'idedificio' => 2
            ]);
        
    }
}
