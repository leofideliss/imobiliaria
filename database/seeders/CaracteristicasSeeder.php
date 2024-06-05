<?php

namespace Database\Seeders;

use App\Models\Caracteristicas;

use Illuminate\Database\Seeder;

class CaracteristicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insertData = [
            ['name' => 'Administração'],
            ['name' =>  'Sistema de alarme'],
            ['name' =>    'Guarita blindada'],
            ['name' =>   'Quintal'],
            ['name' =>   'Varanda'],
            ['name' =>   'Garage band'],
            ['name' =>     'Banheira'],
            ['name' =>    'Bar'],
            ['name' =>    'Churrasqueira na varanda'],
            ['name' =>    'Churrasqueira'],
            ['name' =>    'Espaço de beleza'],
            ['name' =>     'Bicicletário'],
            ['name' =>     'Armário embutido'],
            ['name' =>     'Zelador'],
            ['name' =>     'Casa de caseiro'],
            ['name' =>     'TV a cabo'],
            ['name' =>     'Perto de hospitais'],
            ['name' =>    'Perto de vias de acesso'],
            ['name' =>     'Perto de transporte público'],

            ['name' =>    'Perto de Escolas'],
            ['name' =>    'Perto de Shopping Center'],
            ['name' =>    'Closet'],
            ['name' =>    'Vigia'],
            ['name' =>    'Ar condicionado'],
            ['name' =>     'Copa'],
            ['name' =>     'Fechadura digital'],
            ['name' =>     'Sala de jantar'],
            ['name' =>    'Condomínio sustentável'],
            ['name' =>     'Condomínio sustentável'],
            ['name' =>     'Coleta seletiva de lixo'],
            ['name' =>    'Edícula'],
            ['name' =>     'Elevador'],
            ['name' =>     'Carregador eletrônico para carro e bicicleta'],
            ['name' =>    'Vista exterior'],
            ['name' =>    'Lareira'],
            ['name' =>     'Espaço fitness'],
            ['name' =>    'Cabeamento estruturado'],
            ['name' =>    'Mobiliado'],
            ['name' =>     'Salão de jogos'],
            ['name' =>    'Jardim'],
            ['name' =>    'Geminada'],
            ['name' =>  'Gerador elétrico'],
            ['name' =>    'Espaço gourmet'],
            ['name' =>   'Varanda gourmet'],
            ['name' =>    'Cozinha Gourmet'],
            ['name' =>    'Cascalho'],
            ['name' =>   'Espaço verde / Parque'],
            ['name' =>   'Academia'],
            ['name' =>  'Aquecimento'],
            ['name' =>     'Escritório'],
            ['name' =>     'Quadra de futebol'],
            ['name' =>    'Interfone'],
            ['name' =>     'Conexão à internet'],
            ['name' =>     'Pista de cooper'],
            ['name' =>    'Cozinha'],
            ['name' =>     'Armário na cozinha'],
            ['name' =>     'Vista para lago'],
            ['name' =>     'Ambientes integrados'],
            ['name' =>     'Terra'],
            ['name' =>     'Cozinha grande'],
            ['name' =>    'Janela grande'],
            ['name' =>     'Lavanderia'],
            ['name' =>     'Gramado'],
            ['name' =>     'Sala de almoço'],
            ['name' =>     'Área de serviço'],
            ['name' =>     'Cinema'],
            ['name' =>    'Sala de reunião'],
            ['name' =>    'Mezanino'],
            ['name' =>    'Vista para a montanha'],
            ['name' =>    'Mais de um andar'],
            ['name' =>    'Vista para o mar'],
            ['name' =>     'Garagem'],
            ['name' =>     'Salão de Festas'],
            ['name' =>     'Ronda/Vigilância'],
            ['name' =>     'Rua asfaltada'],
            ['name' =>     'Serviço pay per use'],
            ['name' =>     'Permite animais'],
            ['name' =>     'Espaço Pet'],
            ['name' =>     'Playground'],
            ['name' =>    'Piscina'],
            ['name' =>    'Recepção'],
            ['name' =>     'Área de lazer'],
            ['name' =>    'Playground'],
            ['name' =>     "Espelhos d'água"],
            ['name' =>     'Quadra de areia'],
            ['name' =>    'Sauna'],
            ['name' =>    'Segurança 24h'],
            ['name' =>     'Piscina semi-olímpica'],
            ['name' =>    'Apartamento inteligente'],
            ['name' =>    'Condomínio inteligente'],
            ['name' =>    'Energia solar'],
            ['name' =>    'Spa'],
            ['name' =>     'Quadra poliesportiva'],
            ['name' =>    'Praça'],
            ['name' =>     'Quadra de squash'],
            ['name' =>     'Escada'],
            ['name' =>    'Loja'],
            ['name' =>     'Quadra de tênis'],
            ['name' =>    'Circuito de segurança'],
            ['name' =>     'públicos essenciais'],
            ['name' =>     'Manobrista'],
            ['name' =>   'Depósito'],
            ['name' =>     'Reservatório de água'],
        ];

        foreach ($insertData as $key => $value) {
            Caracteristicas::create($value);
        }
    }
}
