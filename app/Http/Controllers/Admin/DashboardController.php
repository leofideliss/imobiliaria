<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Condominio;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Property;
use App\Models\TypeProperty;
use App\Models\Configurations;
use App\Models\Proprietarios;
use App\Models\User;
use Exception;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $error_message = '';

        // Verificar se ambos os campos de data estão preenchidos
        if (!$start_date || !$end_date) {
            // Definir datas padrão ou tratar a falta de datas conforme necessário
            $start_date = date('Y-m-d', strtotime('-7 days')); // Data padrão de 7 dias atrás
            $end_date = date('Y-m-d'); // Data atual
            $error_message = "Por favor, selecione uma data de início e uma data de fim.";
        }

        $start_date .= ' 00:00:00';
        $end_date .= ' 23:59:59';


        $todasPropriedades = Property::whereBetween('created_at', [$start_date, $end_date])->get();

        // $todasPropriedades = Property::all();
        $todasCidades = City::whereBetween('created_at', [$start_date, $end_date])->get();
        $todosCondominios = Condominio::whereBetween('created_at', [$start_date, $end_date])->get();

        $todosAdmins = User::whereBetween('created_at', [$start_date, $end_date])->get();
        $todosFuncionarios = Employee::whereBetween('created_at', [$start_date, $end_date])->get();
        $todosUsuarios = Customer::whereBetween('created_at', [$start_date, $end_date])->get();

        $todasConfiguracoes = Configurations::all();

        $acessos = 0;
        foreach ($todasConfiguracoes as $config) {
            $acessos = $config->website_access;
        }

        $maiorQtdAccess  = Property::max('qtd_access');

        // Encontre a instância completa da propriedade associada a esse valor máximo
        $propriedadeComMaiorQtdAccess = Property::where('qtd_access', $maiorQtdAccess)->first();
        
        // ********* INICIO USUÁRIO EXTERNO *********

        // Inicializar um array para armazenar o número de propriedades de cada cliente
        $propriedadesPorCliente = [];

        // Iterar sobre todas as propriedades
        foreach ($todasPropriedades as $propriedade) {
            // Obter o código do cliente associado a esta propriedade
            $customerCode = $propriedade->customer_code;

            // Incrementar o contador de propriedades para este cliente
            if (!isset($propriedadesPorCliente[$customerCode])) {
                $propriedadesPorCliente[$customerCode] = 1;
            } else {
                $propriedadesPorCliente[$customerCode]++;
            }
        }

        // Inicializar um array para armazenar os dados dos clientes com propriedades
        $clientesComPropriedades = [];

        // Iterar sobre os clientes e verificar se eles possuem propriedades
        foreach ($propriedadesPorCliente as $customerId => $quantidadePropriedades) {
            if ($quantidadePropriedades > 0) {
                // Se o cliente possuir propriedades, buscar o cliente e salvar os dados
                $cliente = Customer::find($customerId);
                if ($cliente) {
                    $clientesComPropriedades[] = [
                        'id_usuario' => $cliente->id,
                        'nome_usuario' => $cliente->name, 
                        'quantidade_propriedades' => $quantidadePropriedades,
                    ];
                }
            }
        }

        usort($clientesComPropriedades, function($a, $b) {
            return $b['quantidade_propriedades'] <=> $a['quantidade_propriedades'];
        });
        
        // Pegar os 10 primeiros elementos do array (os clientes com as maiores quantidades de propriedades)
        $top10Clientes = array_slice($clientesComPropriedades, 0, 10);

        // ********* INICIO USUÁRIO INTERNO *********

        // Inicializar um array para armazenar o número de propriedades de cada cliente
        $propriedadesUserInternos = [];

        // Iterar sobre todas as propriedades
        foreach ($todasPropriedades as $propriedade) {
            // Obter o código do cliente associado a esta propriedade
            $customerCodeInterno = $propriedade->user_code;

            // Incrementar o contador de propriedades para este cliente
            if (!isset($propriedadesUserInternos[$customerCodeInterno])) {
                $propriedadesUserInternos[$customerCodeInterno] = 1;
            } else {
                $propriedadesUserInternos[$customerCodeInterno]++;
            }
        }

        // Inicializar um array para armazenar os dados dos clientes com propriedades
        $userInternoComPropriedades = [];

        // Iterar sobre os clientes e verificar se eles possuem propriedades
        foreach ($propriedadesUserInternos as $customerId => $quantidadePropriedades) {
            if ($quantidadePropriedades > 0) {
                // Se o cliente possuir propriedades, buscar o cliente e salvar os dados
                $clienteInterno = User::find($customerId);
                if ($clienteInterno) {
                    $userInternoComPropriedades[] = [
                        'id_usuario' => $clienteInterno->id,
                        'nome_usuario' => $clienteInterno->name, 
                        'quantidade_propriedades' => $quantidadePropriedades,
                    ];
                }
            }
        }

        usort($userInternoComPropriedades, function($a, $b) {
            return $b['quantidade_propriedades'] <=> $a['quantidade_propriedades'];
        });

        // Pegar os 10 primeiros elementos do array (os clientes com as maiores quantidades de propriedades)
        $top10UserInterno = array_slice($userInternoComPropriedades, 0, 10);

        // Selecionar as 10 melhores propriedades baseadas no valor de 'qtd_acesso'
        $propriedadesMaisAcessos = Property::orderBy('qtd_access', 'desc')->take(10)->get();


        // ********* INICIO BAIRROS *********
        // Inicializar um array para armazenar os 'districts' e suas contagens
        $contagemDistricts = [];


        // Array para armazenar o número de propriedades por proprietário
        $proprietariosComContagem = [];

        // Percorrer as propriedades
        foreach ($todasPropriedades as $propriedade) {
            // Obter o ID do proprietário associado a esta propriedade
            $proprietarioId = $propriedade->proprietario;

            // Buscar o nome do proprietário na tabela 'proprietarios' usando o ID
            $proprietario = Proprietarios::find($proprietarioId);

            // Verificar se o proprietário foi encontrado
            if ($proprietario) {
                $nomeProprietario = $proprietario->nome;

                // Incrementar o contador de propriedades para este proprietário
                if (!isset($proprietariosComContagem[$nomeProprietario])) {
                    $proprietariosComContagem[$nomeProprietario] = 1;
                } else {
                    $proprietariosComContagem[$nomeProprietario]++;
                }
            }
        }

        // Iterar sobre as propriedades
        foreach ($todasPropriedades as $propriedade) {
            // Obter o 'district' da propriedade
            $district = $propriedade->district;

            // Verificar se o 'district' já existe no array de contagem
            if (!isset($contagemDistricts[$district])) {
                // Se não existir, inicializar a contagem como 1
                $contagemDistricts[$district] = 1;
            } else {
                // Se já existir, incrementar a contagem
                $contagemDistricts[$district]++;
            }
        }

        arsort($contagemDistricts);

        // Selecionar apenas os dez primeiros 'districts'
        $top10Districts = array_slice($contagemDistricts, 0, 10);

        // Selecionar apenas os dez primeiros 'proprietarios'
        $top10Proprietarios = array_slice($proprietariosComContagem, 0, 10);


        return view(
            'admin.dashboard.index',
            [
                'start_date' => $start_date,
                'end_date' => $end_date,
                'qtdCidades' => count($todasCidades),
                'qtdImoveis' => count($todasPropriedades),
                'qtdCondominios' => count($todosCondominios),
                'qtdAdmins' => count($todosAdmins),
                'qtdFuncionarios' => count($todosFuncionarios),
                'qtdUsuarios' => count($todosUsuarios),
                'acessosPrincipal' => $acessos,
                'maiorAcesso' => $propriedadeComMaiorQtdAccess,
                'customerRank' => $top10Clientes,
                'userInternoRank' => $top10UserInterno,
                'propriedadesMaisAcessos' => $propriedadesMaisAcessos,
                'rankDistrict' => $top10Districts,
                'rankProprietarios' => $top10Proprietarios,
                "bread_title" => "Dashboard",
                "bread_subcontents" => [
                    [
                        'title' => "",
                        "target_url" =>  route("admin.dashboard.index")
                    ],
                ],
                'error_message' => $error_message,
            ]
        );
    }

    // public function gamificacao()
    // {
    //     return view(
    //         'admin.dashboard.gamificacao',
    //         [
    //             "bread_title" => "Gamificação",
    //             "bread_subcontents" => [
    //                 [
    //                     'title' => "Confira os pontos dos imóveis",
    //                     "target_url" =>  route("admin.dashboard.gamificacao")
    //                 ],

    //             ]
    //         ]
    //     );
    // }


    public function getProperties()
    {
        $ret = null;
        try {

            $imoveisVenda = Property::where('category', '=', 'Venda')->get();
            $imoveisAluguel = Property::where('category', '=', 'Aluguel')->get();

            $ret = [
                'code' => 200,
                'status' => true,
                'message' => "OK",
                'imoveisVenda' => $imoveisVenda,
                'imoveisAluguel' => $imoveisAluguel,
            ];
        } catch (Exception $e) {
            $ret = [
                'code' => 400,
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function getTiposImoveis()
    {
        $ret = null;
        try {

            $todosImoveis = Property::all();
            $arrayImoveis = [];

            foreach ($todosImoveis as $imovel) {
                array_push($arrayImoveis, $imovel);
            }

            $arrayTodos = [];

            while (count($arrayImoveis) != 0) {
                $variavel = $arrayImoveis[0]->type_prop_id;
                $i = 0;

                foreach ($arrayImoveis as $imovel) {
                    if ($imovel->type_prop_id === $variavel) {
                        $i++;
                    }
                }

                $arrayTodos[] = [$variavel, $i];

                $arrayImoveis = array_values(array_filter($arrayImoveis, function ($valor) use ($variavel) {
                    return $valor->type_prop_id !== $variavel;
                }));
            }

            $tiposPropriedades = TypeProperty::all();

            foreach ($arrayTodos as &$todosImoveis) {
                foreach ($tiposPropriedades as $tipoPropriedade) {
                    if ($tipoPropriedade->id === $todosImoveis[0]) {
                        $todosImoveis[0] = $tipoPropriedade->name;
                    }
                }
            }

            $ret = [
                'code' => 200,
                'status' => true,
                'message' => "OK",
                'arrayTodos' => $arrayTodos,
            ];
        } catch (Exception $e) {
            $ret = [
                'code' => 400,
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    
    public function getMunicipios()
    {
        $ret = null;
        try {

            $todosImoveis = Property::all();
            $arrayImoveis = [];

            foreach ($todosImoveis as $imovel) {
                array_push($arrayImoveis, $imovel);
            }

            $arrayTodos = [];

            while (count($arrayImoveis) != 0) {
                $variavel = $arrayImoveis[0]->city_id;
                $i = 0;

                foreach ($arrayImoveis as $imovel) {
                    if ($imovel->city_id === $variavel) {
                        $i++;
                    }
                }

                $arrayTodos[] = [$variavel, $i];

                $arrayImoveis = array_values(array_filter($arrayImoveis, function ($valor) use ($variavel) {
                    return $valor->city_id !== $variavel;
                }));
            }

            $cidadesAll = City::all();

            foreach ($arrayTodos as &$todosImoveis) {
                foreach ($cidadesAll as $cidade) {
                    if ($cidade->id === $todosImoveis[0]) {
                        $todosImoveis[0] = $cidade->citie;
                    }
                }
            }

            $ret = [
                'code' => 200,
                'status' => true,
                'message' => "OK",
                'arrayTodos' => $arrayTodos,
            ];
        } catch (Exception $e) {
            $ret = [
                'code' => 400,
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function getValoresImoveis()
    {


        $ret = null;
        try {
            

            $imoveis200 = Property::where('category', '=', 'Venda')
            ->where('prop_price', '<=', 200000)
            ->get();

            $imoveis200to400 = Property::where('category', '=', 'Venda')
            ->where('prop_price', '>', 200000)
            ->where('prop_price', '<=', 400000)
            ->get();

            $imoveis400to600 = Property::where('category', '=', 'Venda')
            ->where('prop_price', '>', 400000)
            ->where('prop_price', '<=', 600000)
            ->get();

            $imoveis600to800 = Property::where('category', '=', 'Venda')
            ->where('prop_price', '>', 600000)
            ->where('prop_price', '<=', 800000)
            ->get();

            $imoveis800to1milhao = Property::where('category', '=', 'Venda')
            ->where('prop_price', '>', 800000)
            ->where('prop_price', '<=', 1000000)
            ->get();

            $imoveis1milhao = Property::where('category', '=', 'Venda')
            ->where('prop_price', '>', 1000000)
            ->get();

            $ret = [
                'code' => 200,
                'status' => true,
                'message' => "OK",
                'imoveis200' => $imoveis200,
                'imoveis200to400' => $imoveis200to400,
                'imoveis400to600' => $imoveis400to600,
                'imoveis600to800' => $imoveis600to800,
                'imoveis800to1milhao' => $imoveis800to1milhao,
                'imoveis1milhao' => $imoveis1milhao,
            ];
        } catch (Exception $e) {
            $ret = [
                'code' => 400,
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function getStatusImovel()
    {
        $ret = null;
        try {

            $imovelAprovado = Property::where('available', '=', 1)->get();
            $imovelAguardando = Property::where('available', '=', 0)->get();

            $ret = [
                'code' => 200,
                'status' => true,
                'message' => "OK",
                'imovelAprovado' => $imovelAprovado,
                'imovelAguardando' => $imovelAguardando,

            ];
        } catch (Exception $e) {
            $ret = [
                'code' => 400,
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }
}
