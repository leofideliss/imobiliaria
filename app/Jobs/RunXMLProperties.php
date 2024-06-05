<?php

namespace App\Jobs;

use App\Models\Caracteristicas;
use App\Models\City;
use App\Models\FileXML;
use App\Models\NearbyPlaces;
use App\Models\PhotosProperty;
use App\Models\Property;
use App\Models\PropertyCaracteristicas;
use App\Models\TypeProperty;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RunXMLProperties implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $user;
    private $urlXML;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user , $urlXML)
    {
        $this->user = $user;
        $this->urlXML = $urlXML;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            //GET data by url
            $responseDist = Http::get($this->urlXML);
            if (!$responseDist)
                throw new Exception('URL inválida');

            $xmlObject = simplexml_load_string($responseDist->body());

            $json = json_encode($xmlObject);
            $array = json_decode($json, true);
            $formated = [];
            $result = [];

            $user = $this->user;

            $tot = count($array['Listings']['Listing']);
            $divider = array_chunk($array['Listings']['Listing'], 15, true);


            foreach ($divider as $key => $value_divider) {
                dispatch((new ProcessXML($value_divider, $user))->onQueue('high'));
            }


            dispatch((new ProcessXMLMidia($responseDist->body(), $user))->onQueue('low'));

            FileXML::where('user_id', '=', $this->user->id)->update(['qtd_imoveis' => $tot]);
        } catch (Exception $th) {
            Log::channel('main')->info(json_encode($th->getMessage()));
        }
    }
}
