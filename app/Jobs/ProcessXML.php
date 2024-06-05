<?php

namespace App\Jobs;

use App\Models\Caracteristicas;
use App\Models\City;
use App\Models\NearbyPlaces;
use App\Models\Property;
use App\Models\PropertyCaracteristicas;
use App\Models\TypeProperty;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ProcessXML implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $propertieArray = [];
    private $user;
    public function __construct($propertieArray, $user)
    {
        $this->propertieArray = $propertieArray;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $traduction = [];
        $traduction['Administration'] =    'Administração';
        $traduction['Alarm System'] =    'Sistema de alarme';
        $traduction['Armored Security Cabin'] =    'Guarita blindada';
        $traduction['Backyard'] =    'Quintal';
        $traduction['Balcony'] =    'Varanda';
        $traduction['Band Practice Room'] =    'Garage band';
        $traduction['Bathtub'] =    'Banheira';
        $traduction['Bar'] =    'Bar';
        $traduction['Barbecue Balcony'] =    'Churrasqueira na varanda';
        $traduction['BBQ'] =    'Churrasqueira';
        $traduction['Beauty Room'] =    'Espaço de beleza';
        $traduction['Bicycles Place'] =    'Bicicletário';
        $traduction['Builtin Wardrobe'] =    'Armário embutido';
        $traduction['Caretaker'] =    'Zelador';
        $traduction['Caretaker House'] =    'Casa de caseiro';
        $traduction['Cable Television'] =    'TV a cabo';
        $traduction['Close to hospitals'] =    'Perto de hospitais';
        $traduction['Close to main roads/avenues'] =    'Perto de vias de acesso';
        $traduction['Close to public transportation'] =    'Perto de transporte público';

        $traduction['Close to schools'] =    'Perto de Escolas';
        $traduction['Close to shopping centers'] =    'Perto de Shopping Center';
        $traduction['Closet'] =    'Closet';
        $traduction['Controlled Access'] =    'Vigia';
        $traduction['Cooling'] =    'Ar condicionado';
        $traduction['Copa'] =    'Copa';
        $traduction['Digital Locker'] =    'Fechadura digital';
        $traduction['Dinner Room'] =    'Sala de jantar';
        $traduction['Eco Condominium'] =    'Condomínio sustentável';

        $traduction['Eco Garbage Collector'] =    'Coleta seletiva de lixo';
        $traduction['Edicule'] =    'Edícula';
        $traduction['Elevator'] =    'Elevador';
        $traduction['Eletric Charger'] =    'Carregador eletrônico para carro e bicicleta';
        $traduction['Exterior View'] =    'Vista exterior';
        $traduction['Fireplace'] =    'Lareira';
        $traduction['Fitness Room'] =    'Espaço fitness';
        $traduction['Fully Wired'] =    'Cabeamento estruturado';
        $traduction['Furnished'] =    'Mobiliado';
        $traduction['Game room'] =    'Salão de jogos';
        $traduction['Garden Area'] =    'Jardim';
        $traduction['Geminada'] =    'Geminada';
        $traduction['Generator'] =    'Gerador elétrico';
        $traduction['Gourmet Area'] =    'Espaço gourmet';
        $traduction['Gourmet Balcony'] =    'Varanda gourmet';
        $traduction['Gourmet Kitchen'] =    'Cozinha Gourmet';
        $traduction['Gravel'] =    'Cascalho';
        $traduction['Green space / Park'] =    'Espaço verde / Parque';
        $traduction['Gym'] =    'Academia';
        $traduction['Heating'] =    'Aquecimento';
        $traduction['Home Office'] =    'Escritório';
        $traduction['Indoor Soccer'] =    'Quadra de futebol';
        $traduction['Intercom'] =    'Interfone';
        $traduction['Internet Connection'] =    'Conexão à internet';
        $traduction['Jogging track'] =    'Pista de cooper';
        $traduction['Kitchen'] =    'Cozinha';
        $traduction['Kitchen Cabinets'] =    'Armário na cozinha';
        $traduction['Lake View'] =    'Vista para lago';
        $traduction['Integrated Environments'] =    'Ambientes integrados';
        $traduction['Land'] =    'Terra';
        $traduction['Large Kitchen'] =    'Cozinha grande';
        $traduction['Large Window'] =    'Janela grande';
        $traduction['Laundry'] =    'Lavanderia';
        $traduction['Lawn'] =    'Gramado';
        $traduction['Lunch Room'] =    'Sala de almoço';
        $traduction["Maid's Quarters"] =    'Área de serviço';
        $traduction['Massage Room'] =    'Cinema';
        $traduction['Meeting Room'] =    'Sala de reunião';
        $traduction['Mezzanine'] =    'Mezanino';
        $traduction['Mountain View'] =    'Vista para a montanha';
        $traduction['Number of stories'] =    'Mais de um andar';
        $traduction['Ocean View'] =    'Vista para o mar';
        $traduction['Parking Garage'] =    'Garagem';
        $traduction['Party Room'] =    'Salão de Festas';
        $traduction['Patrol'] =    'Ronda/Vigilância';
        $traduction['Paved Street'] =    'Rua asfaltada';
        $traduction['Pay-per-use Services'] =    'Serviço pay per use';
        $traduction['Pets Allowed'] =    'Permite animais';
        $traduction['Pet Space'] =    'Espaço Pet';
        $traduction['Playground'] =    'Playground';
        $traduction['Pool'] =    'Piscina';
        $traduction['Reception room'] =    'Recepção';
        $traduction['Recreation Area'] =    'Área de lazer';
        $traduction['Reflective Pool'] =    'Playground';
        $traduction['Playground'] =    "Espelhos d'água";
        $traduction['Sand Pit'] =    'Quadra de areia';
        $traduction['Sauna'] =    'Sauna';
        $traduction['Security Guard on Duty'] =    'Segurança 24h';
        $traduction['Semi Olympic Pool'] =    'Piscina semi-olímpica';
        $traduction['Smart Apartment'] =    'Apartamento inteligente';
        $traduction['Smart Condominium'] =    'Condomínio inteligente';
        $traduction['Solar Energy'] =    'Energia solar';
        $traduction['Spa'] =    'Spa';
        $traduction['Sports Court'] =    'Quadra poliesportiva';
        $traduction['Square'] =    'Praça';
        $traduction['Squash'] =    'Quadra de squash';
        $traduction['Stair'] =    'Escada';
        $traduction['Stores'] =    'Loja';
        $traduction['Tennis court'] =    'Quadra de tênis';
        $traduction['TV Security'] =    'Circuito de segurança';
        $traduction['Utilities'] =    'públicos essenciais';
        $traduction['Valet Parking'] =    'Manobrista';
        $traduction['Warehouse'] =    'Depósito';
        $traduction['Water Tank'] =    'Reservatório de água';
        // tipos de imoveis

        $traduction['Residential / Apartment'] =    'Apartamento';
        $traduction['Residential / Home'] =    'Casa';
        $traduction['Residential / Condo'] =    'Casa de Condomínio';
        $traduction['Residential / Village House'] =    'Casa de Vila';
        $traduction['Residential / Penthouse'] =    'Cobertura';
        $traduction['Residential / Farm Ranch'] =    'Chácara';
        $traduction['Commercial / Consultorio'] =    'Consultório';
        $traduction['Commercial / Edificio Residencial'] =    'Edifício Residencial';
        $traduction['Commercial / Agricultural'] =    'Fazenda/Sítios/Chácaras';
        $traduction['Residential / Flat'] =    'Flat';
        $traduction['Commercial / Industrial'] =    'Galpão/Depósito/Armazém';
        $traduction['Commercial / Hotel'] =    'Hotel/Motel/Pousada';
        $traduction['Commercial / Building'] =    'Galpão/Depósito/Armazém';
        $traduction['Commercial / Industrial'] =    'Imóvel Comercial';
        $traduction['Residential / Kitnet'] =    'Kitnet/Conjugado';
        $traduction['Residential / Studio'] =    'Apartamento	Studio';
        $traduction['Residential / Land Lot'] =    'Lote/Terreno';
        $traduction['Commercial / Land Lot'] =    'Lote/Terreno';
        $traduction['Commercial / Business'] =    'Ponto Comercial/Loja/Box';
        $traduction['Commercial / Edificio Comercial'] =    'Prédio/Edifício';
        $traduction['Commercial / Office'] =    'Conjunto Comercial / Sala';
        $traduction['Residential / Sobrado'] =    'Sobrado';

        $user = $this->user;



        foreach ($this->propertieArray as $key2 => $value2) {
            $formated['prop_code'] = $value2['ListingID'];

            $formated['created_at'] = $value2['ListDate'];
            $formated['updated_at'] = $value2['LastUpdateDate'];
            $formated['number'] = isset($value2['Location']['StreetNumber']) ?  $value2['Location']['StreetNumber'] : null;
            $formated['CEP'] = $value2['Location']['PostalCode'];
            $formated['lat'] = $value2['Location']['Latitude'];
            $formated['lng'] = $value2['Location']['Longitude'];
            $formated['complement'] = isset($value2['Location']['Complement']) ? $value2['Location']['Complement'] : null;
            $formated['name_vendor'] = $value2['ContactInfo']['Name'];
            $formated['phone_vendor'] = $value2['ContactInfo']['Telephone'];
            $formated['email_vendor'] = $value2['ContactInfo']['Email'];
            $formated['prop_size'] = $value2['Details']['LivingArea'];
            $formated['bedroom'] = $value2['Details']['Bedrooms'];
            $formated['bathrooms'] = $value2['Details']['Bathrooms'];
            $formated['garage'] = $value2['Details']['Garage'];
            $formated['suites'] = $value2['Details']['Suites'];
            $formated['andar_apartamento'] = isset($value2['Details']['UnitFloor']) ? $value2['Details']['UnitFloor'] : null;
            $formated['condominium_price'] = isset($value2['Details']['PropertyAdministrationFee']) ? $value2['Details']['PropertyAdministrationFee'] : null;
            $formated['description'] = $value2['Details']['Description'];
            $formated['finalidade'] = isset($value2['Details']['UsageType']) ? $value2['Details']['UsageType'] : null;




            if ($value2['Status']['PropertyStatus'] == 'Available')
                $formated['available'] = 1;
            else
                $formated['available'] = 0;

            if (isset($value2['TransactionType']))
                switch ($value2['TransactionType']) {
                    case 'For Sale':
                        $formated['category'] = 'Venda';
                        $formated['prop_price'] = $value2['Details']['ListPrice'];
                        $formated['price'] = $value2['Details']['ListPrice'];
                        break;
                    case 'For Rent':
                        $formated['category'] = 'Aluguel';
                        $formated['prop_rent'] = $value2['Details']['RentalPrice'];
                        $formated['price'] = $value2['Details']['RentalPrice'];
                        break;
                    case 'Sale/Rent':
                        $formated['category'] = 'Venda / Aluguel';
                        $formated['prop_rent'] = $value2['Details']['RentalPrice'];
                        $formated['prop_price'] = $value2['Details']['ListPrice'];


                        break;
                }

            $list_caracteristicas = [];
            if (isset($value2['Details']['Features']['Feature']))
                foreach ($value2['Details']['Features']['Feature'] as $key => $value4) {

                    $caract = Caracteristicas::where('name', '=', $traduction[$value4])->first();
                    if ($caract == null) {
                        $new_value =  Caracteristicas::create(['name' => $traduction[$value4]]);
                        array_push($list_caracteristicas, $new_value->id);
                    } else
                        array_push($list_caracteristicas, $caract->id);
                }

            $nameType  = $value2['Details']['PropertyType'];

            $type =  TypeProperty::where('name', '=', $traduction[$nameType])->first();

            if ($type == null)
                $type = TypeProperty::create(['name' => $nameType]);

            $formated['type_prop_id'] = $type->id;

            $responseCEP = Http::get('https://brasilapi.com.br/api/cep/v2/' . $formated['CEP']);
            if ($responseCEP->body() != null) {
                $decodeCEP = json_decode($responseCEP->body());
                $formated['street'] = isset($decodeCEP->street) ? $decodeCEP->street : null;
                $formated['city_name'] =  isset($decodeCEP->city) ? $decodeCEP->city : null;
                $formated['district'] =  isset($decodeCEP->neighborhood) ? $decodeCEP->neighborhood : null;
                $formated['state'] =  isset($decodeCEP->state) ? $decodeCEP->state : null;
            }

            if (isset($user->type)) {
                $formated['user_code'] = $user->id;
                $formated['customer_code'] = null;
            } else {
                $formated['customer_code'] = $user->id;
                $formated['user_code'] = null;
            }

            $findCitie = City::where([
                ['state', '=', $formated['state']],
                ['citie', '=', $formated['city_name']]
            ])->first();

            if ($findCitie != null)
                $formated['citie_id'] = $findCitie->id;
            else {
                if ($formated['city_name'] != null && $formated['state'] != null) {
                    $city_id = City::create(['citie' => $formated['city_name'], 'state' => $formated['state']])->id;
                    $formated['citie_id'] = $city_id;
                }
            }

            $title = $type->name . " em " . $formated['city_name'] . " (" . $formated['prop_size'] . " m²)";

            $add = Property::where('prop_code', '=', $formated['prop_code'])->first();
            // verifica se o imovel já existe
            if (!$add) {
                $add =  Property::create([
                    'prop_code' => $formated['prop_code'],
                    'suites' => $formated['suites'],
                    'CEP' => $formated['CEP'],
                    'bathrooms' => $formated['bathrooms'],
                    'bedroom' => $formated['bedroom'],
                    'category' => $formated['category'],
                    'complement' => $formated['complement'] ? $formated['complement'] : null,
                    // 'description' => $formated['description'][0],
                    'district' => $formated['district'],
                    'garage' => $formated['garage'] ? $formated['garage'] : 0,
                    'number' => $formated['number'],
                    'prop_price' => isset($formated['prop_price']) ? $formated['prop_price'] : 0,
                    'prop_rent' => isset($formated['prop_rent']) ? $formated['prop_rent'] : 0,
                    'price' => isset($formated['prop_rent']) ? $formated['prop_rent'] : $formated['prop_price'],
                    'prop_size' => $formated['prop_size'],
                    'state' => $formated['state'],
                    'street' => $formated['street'],
                    'name_vendor' => $formated['name_vendor'],
                    'phone_vendor' => $formated['phone_vendor'],
                    'email_vendor' => $formated['email_vendor'],
                    'type_prop_id' => $formated['type_prop_id'],
                    'city_id' =>  isset($formated['citie_id']) ? $formated['citie_id'] : 99,
                    'city_name' =>  isset($formated['city_name']) ? $formated['city_name'] : null,
                    'user_code' => $formated['user_code'],
                    'customer_code' => $formated['customer_code'],
                    'lat' =>  $formated['lat'],
                    'lng' => $formated['lng'],
                    'andar_apartamento' => $formated['andar_apartamento'],
                    'is_from_xml' => 1,
                    'title' => $title,
                    'finalidade' => $formated['finalidade']
                ]);
            } else {
                PropertyCaracteristicas::where('property_id', '=', $add->id)->delete();
                $add->update([
                    'prop_code' => $formated['prop_code'],
                    'suites' => $formated['suites'],
                    'CEP' => $formated['CEP'],
                    'bathrooms' => $formated['bathrooms'],
                    'bedroom' => $formated['bedroom'],
                    'category' => $formated['category'],
                    'complement' => $formated['complement'] ? $formated['complement'] : null,
                    // 'description' => $formated['description'][0],
                    'district' => $formated['district'],
                    'garage' => $formated['garage'] ? $formated['garage'] : 0,
                    'number' => $formated['number'],
                    'prop_price' => isset($formated['prop_price']) ? $formated['prop_price'] : 0,
                    'prop_rent' => isset($formated['prop_rent']) ? $formated['prop_rent'] : 0,
                    'price' => isset($formated['prop_rent']) ? $formated['prop_rent'] : $formated['prop_price'],
                    'prop_size' => $formated['prop_size'],
                    'state' => $formated['state'],
                    'street' => $formated['street'],
                    'name_vendor' => $formated['name_vendor'],
                    'phone_vendor' => $formated['phone_vendor'],
                    'email_vendor' => $formated['email_vendor'],
                    'type_prop_id' => $formated['type_prop_id'],
                    'city_id' =>  isset($formated['citie_id']) ? $formated['citie_id'] : 99,
                    'city_name' =>  isset($formated['city_name']) ? $formated['city_name'] : null,
                    'user_code' => $formated['user_code'],
                    'customer_code' => $formated['customer_code'],
                    'lat' =>  $formated['lat'],
                    'lng' => $formated['lng'],
                    'andar_apartamento' => $formated['andar_apartamento'],
                    'is_from_xml' => 1,
                    'title' => $title,
                    'finalidade' => $formated['finalidade']
                ]);
            }




            if (count($list_caracteristicas) > 0) {
                foreach ($list_caracteristicas as $key => $value) {

                    $insertProp = [
                        'property_id' => $add->id,
                        'caracteristicas_id' => $value
                    ];
                    PropertyCaracteristicas::insert($insertProp);
                }
            }

            if ($add->lat != null && $add->lng != null) {
                $this->nearbyPlacesXML($add);
            }
        }
    }

    private function nearbyPlacesXML($propertie)
    {
    }
    // {
    //     $nearby = NearbyPlaces::where([["property_id", "=", $propertie->id]])->get();
    //     foreach ($nearby as $key => $value) {
    //         $value->delete();
    //     }

    //     $restaurant = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $propertie->lat . "%2C" . $propertie->lng . "&radius=1000&type=gym&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&language=pt-BR";
    //     $restaurantResponse = Http::get($restaurant);
    //     $dataRestaurant =  json_decode($restaurantResponse->body());
    //     $count_res = 0;
    //     foreach ($dataRestaurant->results as $key => $value) {
    //         if ($count_res < 3)
    //             if ($value->business_status == "OPERATIONAL") {

    //                 $responseDist = Http::get("https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $propertie->lat . "%2C" . $propertie->lng . "&destinations=" . $value->geometry->location->lat . "%2C" . $value->geometry->location->lng . "&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0");
    //                 $data = json_decode($responseDist->body());
    //                 NearbyPlaces::create([
    //                     'property_id' => $propertie->id,
    //                     'name' => $value->name,
    //                     'place_id' => $value->place_id,
    //                     'vicinity' => $value->vicinity,
    //                     'lat' => $value->geometry->location->lat,
    //                     'lng' => $value->geometry->location->lng,
    //                     'type' => "Restaurante",
    //                     'dist' => $data->rows[0]->elements[0]->distance->text
    //                 ]);

    //                 $count_res++;
    //             }
    //     }

    //     $supermarket = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $propertie->lat . "%2C" . $propertie->lng . "&radius=1000&type=supermarket&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&language=pt-BR";
    //     $supermarketResponse = Http::get($supermarket);
    //     $datasupermarket =  json_decode($supermarketResponse->body());
    //     $cont_supermarket = 0;
    //     foreach ($datasupermarket->results as $key => $value) {
    //         if ($cont_supermarket < 3)
    //             if ($value->business_status == "OPERATIONAL") {

    //                 $responseDist = Http::get("https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $propertie->lat . "%2C" . $propertie->lng . "&destinations=" . $value->geometry->location->lat . "%2C" . $value->geometry->location->lng . "&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0");
    //                 $data = json_decode($responseDist->body());
    //                 NearbyPlaces::create([
    //                     'property_id' => $propertie->id,
    //                     'name' => $value->name,
    //                     'place_id' => $value->place_id,
    //                     'vicinity' => $value->vicinity,
    //                     'lat' => $value->geometry->location->lat,
    //                     'lng' => $value->geometry->location->lng,
    //                     'type' => "Super Mercado",
    //                     'dist' => $data->rows[0]->elements[0]->distance->text
    //                 ]);

    //                 $cont_supermarket++;
    //             }
    //     }

    //     $school = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $propertie->lat . "%2C" . $propertie->lng . "&radius=1000&type=school&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&language=pt-BR";
    //     $schoolResponse = Http::get($school);
    //     $dataschool =  json_decode($schoolResponse->body());
    //     $cont_school = 0;
    //     foreach ($dataschool->results as $key => $value) {
    //         if ($cont_school < 3)
    //             if ($value->business_status == "OPERATIONAL") {

    //                 $responseDist = Http::get("https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $propertie->lat . "%2C" . $propertie->lng . "&destinations=" . $value->geometry->location->lat . "%2C" . $value->geometry->location->lng . "&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0");
    //                 $data = json_decode($responseDist->body());
    //                 NearbyPlaces::create([
    //                     'property_id' => $propertie->id,
    //                     'name' => $value->name,
    //                     'place_id' => $value->place_id,
    //                     'vicinity' => $value->vicinity,
    //                     'lat' => $value->geometry->location->lat,
    //                     'lng' => $value->geometry->location->lng,
    //                     'type' => "Escola",
    //                     'dist' => $data->rows[0]->elements[0]->distance->text
    //                 ]);

    //                 $cont_school++;
    //             }
    //     }
    // }
}
