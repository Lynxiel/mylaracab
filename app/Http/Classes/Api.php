<?php

namespace App\Http\Classes;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Api extends Client
{

    protected string $conftoken;
    public array $commands =[
      'search' => '/ищи',
      'start' => '/start',
      'about' => '/about',
//      'delete' => '/delete',
    ];

    public ?string $chatID;
    public ?string $text;

    public function __construct($token)
    {
        parent::__construct();
        $this->conftoken = $token;
        $this->chatID = ChatData::instance()->getChatID();
        $this->text = ChatData::instance()->getMessageText();
    }
    /**
     *
     * @param string $message - сообщение от бота
     * @return mixed - результат выполнения
     * @throws JsonException
     *
     */

    public function sendMessage(string $message, string $chat_id=null, $markup=''): mixed
    {

        $response = $this->request('POST', 'https://api.telegram.org/bot'.$this->conftoken.'/sendMessage', [
            'body' => '{"text":"'.$message.'","parse_mode":"Markdown",
            "disable_web_page_preview":true,
            "disable_notification":false,"reply_to_message_id":null,"chat_id":"'.($chat_id??$this->chatID).'",
            "reply_markup": '.$markup.'
            }',
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return $response->getBody();
    }


    public function sendAudio(string $title, string $artist,string $link, ?string $chat_id=null)
    {
        $response = $this->request('POST', 'https://api.telegram.org/bot' . $this->conftoken . '/sendAudio', [
            'body' => '{"audio":"'.$link.'",
            "duration":null,
            "performer":"'.$artist.'",
            "track":"'.$title.'",
            "disable_notification":false,"reply_to_message_id":null,"chat_id":' .($chat_id??$this->chatID)   . '}',
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return $response->getBody();

    }

    public function sendChatAction($action , $chat_id)
    {
        $response = $this->request('POST', 'https://api.telegram.org/'.$this->conftoken.'/sendChatAction', [
            'body' => '{"chat_id":'. $chat_id .',"action":'.$action.'}',
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

    }

    function search(string $search){
        try {
            $response = Http::get('https://musify.club/search?searchText='. $search);
//        $html = trim(preg_replace('/\s\s+/', ' ', $response->body()));
            $html =  $response->body();
            $dom =new \DOMDocument("1.0", "utf-8");
            @$dom->loadHtml($html);
            $divs = $dom->getElementsByTagName('div');
            $k=0;
            foreach ($divs as $div){
                if ($div->getAttribute('class')=='playlist playlist--hover' ){
                    $tracks = $div->getelementsByTagName('div');

                    foreach ($tracks as $track){

                        if ($track->getAttribute('class')=='playlist__item' ){

                            $link ='https://musify.club'. $track->getelementsByTagName('div')[0]->getAttribute('data-url');
                            $artist =  $track->getAttribute('data-artist');
                            $title =  $track->getAttribute('data-name') ;
                            try {
                                $this->sendAudio( $title, $artist, $link, $this->chatID );
                            }
                            catch (\Exception $e){
                                continue;
                            }

//                            $this->sendMessage($artist . ' ' . $title. ' ' . $link);
                            $k++;
                        }
                        if ($k>4) {
                            $this->sendMessage('Готово!');
                            break;
                        }
                    }
                }

            }
            if ($k==0){
            $this->sendMessage('Ничего не нашел :(');
            return;
                }



        } catch (e){
            $this->sendMessage('Возникла ошибка!');
        }


    }

    public function start(){
        $this->sendMessage( "Чтобы начать поиск набери /ищи и ключевые слова для поиска. В результатах будут отражены 5 треков. Если нужного трека среди нет - попробуйте изменить свой запрос." );
    }

    public function about(){
        $this->sendMessage( "Свои отзывы об использовании бота и предложения пишите в личку @Skandiy. Я не кусаюсь :)" );
    }




    public function keyboard(array $data){
        $k=0;

        foreach ($divs as $div){
            if ($div->getAttribute('class')=='playlist__item'){
                $link =$div->getelementsByTagName('div')[0]->getAttribute('data-url');
                $keyboard['inline_keyboard'][$k][0]['text'] =$div->getAttribute('data-name') . ' - ' . $div->getAttribute('data-artist');
                $keyboard['inline_keyboard'][$k++][0] ['url']='https://musify.club/'. $link;
            }
            if ($k>5) break;

            return json_encode($keyboard);

        }
}





}
