<?php
namespace App\Http\Controllers\Bot;

use App\Http\Classes\Api;

class CommandSearch implements CommandsInterface{

    public function index(Api $bot, $args){

        $response = Http::get('https://musify.club/search?searchText='. $args);
        $html =  $response->body();
        $dom =new \DOMDocument("1.0", "utf-8");
        @$dom->loadHtml($html);
        $divs = $dom->getElementsByTagName('div');
        $k=0;
        foreach ($divs as $div){

            if ($div->getAttribute('class')=='playlist__item'){
                $link ='https://musify.club/'. $div->getelementsByTagName('div')[0]->getAttribute('data-url');
                $artist =  $div->getAttribute('data-artist');
                $title =  $div->getAttribute('data-name') ;
                $bot->sendAudio( $title, $artist, $link );
                $k++;
            }
            if ($k>4) break;
        }
    }
}
