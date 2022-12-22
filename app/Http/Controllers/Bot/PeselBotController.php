<?php

namespace App\Http\Controllers\Bot;
use App\Http\Classes\ChatData;
use GuzzleHttp\Client;
use App\Http\Classes\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class PeselBotController extends Controller
{

    public function index()
    {

        $bot = new Api("5646481073:AAHusrDcUuQSKxOXMJ_W_qkTCiN2leio1CI"  );
//        $bot->sendMessage($bot->text??'dsadasda', $bot->chatID);
//        return;
        if (isset($bot->text) && $bot->text[0]=='/'){
            $command = explode(' ', $bot->text, 2);

            if ($key = array_search($command[0], $bot->commands)){
                $bot->$key($command[1]??null);

            }
            else {
                $bot->sendMessage('Команда '. $bot->text . ' не найдена');
            }

            return;
        }
        $bot->sendMessage('Что-то пошло не по плану');


//        $ids = ['1158847216', '1215906886'];
    }

    public function test()
    {
//        $bot = new Api("5646481073:AAHusrDcUuQSKxOXMJ_W_qkTCiN2leio1CI" );
//        $bot->sendMessage($bot->text??'12345', $bot->chatID??1215906886);
//        $bot->sendMessage('123', '1215906886');
//        return;

        $bot = new Api("5646481073:AAHusrDcUuQSKxOXMJ_W_qkTCiN2leio1CI",);
        $bot->text='/ищи misha';
        $bot->chatID='1215906886';

        if ($bot->text[0]=='/'){
            $command = explode(' ', $bot->text, 2);

            if ($key = array_search($command[0], $bot->commands)){
                $bot->$key($command[1]??null);

            }
            else {
                $bot->sendMessage('Команда '. $bot->text . ' не найдена');
            }

            return;
        }
        $bot->sendMessage('Что-то пошло не по плану');
        RETURN;

        $incChatId = $bot->basicChatData["message"]["chat"]["id"];
        $ids = ['1158847216', '1215906886'];
        if (($key = array_search($incChatId, $ids)) !== false) {
            unset($ids[$key]);
            foreach ($ids as $id){
                $bot->sendMessage($message, $id );
            }

        }else {
            $bot->sendMessage($incChatId, $incChatId);
        }
    }


    public function testChatData(){
        $data = array (
            'update_id' => 986419538,
            'message' =>
                array (
                    'message_id' => 1797,
                    'from' =>
                        array (
                            'id' => 1215906886,
                            'is_bot' => false,
                            'first_name' => 'Skandiy',
                            'username' => 'Skandiy',
                            'language_code' => 'ru',
                        ),
                    'chat' =>
                        array (
                            'id' => 1215906886,
                            'first_name' => 'Skandiy',
                            'username' => 'Skandiy',
                            'type' => 'private',
                        ),
                    'date' => 1671174586,
                    'text' => 'Fufugi',
                ),
        );

        $data = json_encode($data);
        dump($data);

    }





}
