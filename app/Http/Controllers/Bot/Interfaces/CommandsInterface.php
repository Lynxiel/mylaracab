<?php
namespace App\Http\Controllers\Bot;

use App\Http\Classes\Api;

interface CommandsInterface{
     public function index(Api $bot, $args);
}
