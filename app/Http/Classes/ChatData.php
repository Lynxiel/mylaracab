<?php
namespace App\Http\Classes;
use Illuminate\Support\Facades\Log;

class ChatData {

    public static ?self $instance = null ;
    protected \stdClass|null $data = null;

    protected function __construct()
    {
        $this->data = json_decode(file_get_contents("php://input" ));
        //Log::info(json_decode(file_get_contents("php://input" ), true));
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getChatID():null|string{
        return $this->data->message->chat->id?? null;
    }
    public function getMessageText():null|string{

        return $this->data->message->text??null;
    }
}
