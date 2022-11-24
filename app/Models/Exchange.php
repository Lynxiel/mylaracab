<?php

namespace App\Models;
use Exception;
use App\Interfaces\PriceParser;



class Exchange
{
    public PriceParser $parser;

    public function __construct(PriceParser $parser){
        $this->parser = $parser;
    }

    public function get():?array{
        return $this->parser->get();
    }
}
