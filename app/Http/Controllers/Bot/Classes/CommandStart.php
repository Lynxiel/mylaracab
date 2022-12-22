<?php
namespace App\Http\Controllers\Bot;

use App\Http\Classes\Api;

class CommandStart implements CommandsInterface{
    public function index(Api $bot, $args){
        $bot->sendMessage( "Чтобы начать поиск набери /ищи и ключевые слова для поиска.
        В результатах будут отражены 5 треков. Если нудного трека среди нет - попробуйте изменить свой запрос.
        Команда /delete удалит служебные сообщения для более удобного формирования плейлиста.
        Но это пока не точно и нереализовано)" );
    }
}
