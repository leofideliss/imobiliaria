<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PhotosProperty;
use App\Models\Property;
use App\Models\TypeProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    // public function detalhes_imovel()
    // {

    //     $properties = Property::all();

    //     $results = [];
    //     foreach ($properties as $key => $property) {

    //         if ($property->category == 'Venda')
    //             $prop_value = $property->prop_price;
    //         else
    //             $prop_value = $property->prop_rent;

    //         array_push($results, [
    //             'propertie' => $properties,
    //         ]);
    //     }

    //     return view(
    //         'user.property.detalhe_imovel',
    //         [
    //             'properties' => $results,
    //             "bread_subcontents" => [
    //                 [
    //                     'title' => "Detalhes Imóvel",
    //                     "target_url" =>  route("user.property.detalhe_imovel")
    //                 ],
    //             ]
    //         ]
    //     );
    // }

    public static function getImagesPropertie($prop_id)
    {
        $imgs = PhotosProperty::where('property_id', '=', $prop_id)->get();
        return $imgs;
    }

    public static function getTypePropertie($prop_id)
    {
        $typePropertie = TypeProperty::where('id', '=', $prop_id)->get();
        return $typePropertie;
    }

    public static function getCaractetisticasPropertie($id)
    {
        $property = Property::where('id', '=', $id)->first();
        $result = $property->getCaracteristicas()->get();
        return $result;
    }

    public function home_imoveis(Request $request)
    {
        $properties = DB::table('properties')->paginate(3);
        if ($request->ajax()) {
            $view = view('properties.load', compact('properties'))->render();
            return Response::json(['view' => $view, 'nextPageUrl' => $properties->nextPageUrl()]);
        }
        return view(
            'user.home.home',
            [
                'properties' => $properties,
                "bread_subcontents" => [
                    [
                        'title' => "Detalhes Imóvel",
                        "target_url" =>  route("user.home.home")
                    ],
                ]
            ]
        );
    }

    public function home2_imoveis()
    {

        return view(
            'user.home.home2',
            [
                'properties' => DB::table('properties')->paginate(4),
                "bread_subcontents" => [
                    [
                        'title' => "Detalhes Imóvel",
                        "target_url" =>  route("user.home.home2")
                    ],
                ]
            ]
        );
    }
}
