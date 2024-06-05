<?php

namespace App\Jobs;

use App\Models\FileXML;
use App\Models\PhotosProperty;
use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessXMLMidia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $file;
    private $user;
    public function __construct($file, $user)
    {
        $this->file = $file;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fileContents = $this->file;

        $xml = new \SimpleXMLElement($fileContents);


        foreach ($xml->Listings->Listing as $key => $value) {
            $description = (string)$value->Details->Description;

            foreach ($value->Media as $key => $value2) {
                foreach ($value2->Item as $key => $value3) {

                    $propertie = Property::where("prop_code", "=", $value->ListingID)->first();


                    $allowedStr = ["youtube", "youtu.be"];


                    if (preg_match("/(youtube|youtu.be)/i", $value3)) {
                        $propertie->id_youtube = $this->getYoutubeEmbedUrl($value3);
                        $propertie->url_video = $value3;
                        $propertie->update();
                    } else {
                        if ($propertie != null) {

                            $photo =  PhotosProperty::where([
                                ['property_id', '=', $propertie->id],
                                ['name', '=', $value3],
                            ])->first();
                            if ($photo == null) {
                                $oDate = date('Y-m-d H:i:s');
                                $insert['name'] = $value3;
                                $insert['pathname'] = $value3;
                                $insert['property_id'] = $propertie->id;
                                $insert['created_at'] = $oDate;

                                PhotosProperty::insert($insert);
                            }
                        }
                    }

                    Property::where("id", "=", $propertie->id)->update(["description" => $description]);
                }
            }
        }

        FileXML::where('user_id', '=', $this->user->id)->update(['processed' => 1]);
    }

    function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }
}
