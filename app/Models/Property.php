<?php

namespace App\Models;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Property extends Model
{
    use HasFactory;
    protected $table = "properties";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'title',
        'CEP',
        'street',
        'number',
        'district',
        'complement',
        'state',
        'prop_size',
        'bedroom',
        'bathrooms',
        'garage',
        'description',
        'category',
        'prop_price',
        'prop_rent',
        'iptu_price',
        'condominium',
        'condominium_price',
        'available',
        'prop_code',
        'user_code',
        'city_id',
        'type_prop_id',
        'cpf_vendor',
        'phone_vendor',
        'name_vendor',
        'url_video',
        'email_vendor',
        'suites',
        'lat',
        'lng',
        'formated_address',
        'place_id',
        'id_youtube',
        'state_name',
        'city_name',
        'price',
        'corretagem',
        'condominio_id',
        'andar_apartamento',
        'customer_code',
        'is_from_xml',
        'available_user',
        'qtd_access',
        'finalidade',
        'status_imovel',
        'inicioObra',
        'fimObra',
        'tempoConstrução',        
        'notaComodidade',        
        'notaFotos',        
        'notaDescricao',        
        'notaVideo',     
        "proprietario"  ,
        'exclusividade'
    ];

    protected $casts = [
        'inicioObra' => 'datetime',
        'fimObra' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(
            function ($model) {
                $model->id = RamseyUuid::uuid4()->toString();
            }
        );
    }

    public function getCaracteristicas()
    {
        return $this->belongsToMany(Caracteristicas::class, 'property_caracteristicas');
    }

    public static function generateJsonMap()
    {
        $properties = Property::get();
        $coordinates = '';

        for ($i = 0; $i < count($properties); $i++) {
            $img = PhotosProperty::where('property_id', '=', $properties[$i]->id)->first();

            $value = '';
            if ($properties[$i]->prop_price == 0)
                $value = number_format($properties[$i]->prop_rent, 2, ',', '.');
            else
                $value = number_format($properties[$i]->prop_price, 2, ',', '.');
            $coordinates .= '{
                "coordinates": [
                  ' . $properties[$i]->lat . ',
                  ' . $properties[$i]->lng . '
                ],
                "className": "custom-marker-dot",
                "popup":';
            $coordinates .= '"';
            $coordinates .= "<div class='card border-0'>   <a href='" . route("user.property.detalhe_imovel", ["id" => $properties[$i]->id]) . "' class='d-block'>       <img src='" . asset(str_replace("public", "storage", $img->pathname)) . "' src='Image'>   </a>   <div class='card-body position-relative pb-3'>       <h4 class='mb-1 fs-xs fw-normal text-uppercase text-primary'>For sale</h4>       <h3 class='h6 mb-1 fs-sm'><a href='real-estate-single-v1.html' class='nav-link stretched-link'>" . $properties[$i]->title . "</a></h3>       <p class='mt-0 mb-2 fs-xs text-muted'>" . $properties[$i]->street . "," . $properties[$i]->number . "-" . $properties[$i]->district . "</p>       <div class='fs-sm fw-bold'>           <i class='fi-cash me-2 fs-base align-middle opacity-70'></i>           R$" . $value . "       </div>   </div>   <div class='card-footer d-flex align-items-center justify-content-center mx-2 pt-2 text-nowrap'>       <span class='d-inline-block px-2 fs-sm'>3<i class='fi-bed ms-1 fs-base text-muted'></i></span>       <span class='d-inline-block px-2 fs-sm'>2<i class='fi-bath ms-1 fs-base text-muted'></i></span><span class='d-inline-block px-2 fs-sm'>1<i class='fi-car ms-1 fs-base text-muted'></i></span>   </div></div>";
            $coordinates .= '"';

            $coordinates .= '}';
            if ($i != count($properties) - 1)
                $coordinates .= ',';
        }
        $contentFile = '{
            "mapLayer": "https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=5vRQzd34MMsINEyeKPIs",
            "scrollWheelZoom": false,
            "coordinates": [
              -7.166253, -34.838470
            ],
            "zoom": 15,
            "markers": [
             ' . $coordinates . '
            ]
          }';
        Storage::disk('public')->put('map.json', $contentFile);
    }
}
