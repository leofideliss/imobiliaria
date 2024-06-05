<?php

namespace Database\Seeders;

use App\Models\TypeProperty;
use Illuminate\Database\Seeder;

class TypePropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insertData = [
            ['name' =>   'Apartamento'],
            ['name' =>    'Casa'],
            ['name' =>   'Casa de Condomínio'],
            ['name' =>   'Casa de Vila'],
            ['name' =>    'Cobertura'],
            ['name' =>    'Chácara'],
            ['name' =>    'Consultório'],
            ['name' =>    'Edifício Residencial'],
            ['name' =>   'Fazenda/Sítios/Chácaras'],
            ['name' =>   'Flat'],
            ['name' =>   'Galpão/Depósito/Armazém'],
            ['name' =>   'Hotel/Motel/Pousada'],
            ['name' =>   'Imóvel Comercial'],
            ['name' =>   'Kitnet/Conjugado'],
            ['name' =>    'Apartamento	Studio'],
            ['name' =>    'Lote/Terreno'],
            ['name' =>   'Ponto Comercial/Loja/Box'],
            ['name' =>    'Prédio/Edifício'],
            ['name' =>    'Conjunto Comercial / Sala'],
            ['name' =>    'Sobrado'],
        ];

        foreach ($insertData as $key => $value) {
            TypeProperty::create($value);
        }
    }
}
