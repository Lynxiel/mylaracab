<?php
namespace App\Models;
use App\Interfaces\PriceParser;


class Kab1c implements PriceParser {

    public string $file;
    public float $ratio;

    public function __construct()
    {
       $config =  config('exchange.1с');
       $this->file = $config['file'] ;
       $this->ratio = $config['price_ratio'] ;
    }

    public function get():array{
        $data =[];
        if (file_exists($this->file)) {
            $xml = simplexml_load_file($this->file);
            $i=0;
            foreach ($xml as $node){
                $data[$i]['1ccode']= $node->Code->__toString();
                $data[$i]['title'] = $node->ProductName->__toString();
                $data[$i]['instock'] = (int)$node->Quantity->__toString();
                $data[$i]['price'] = ((float)$node->Price->__toString()*$this->ratio);
                $data[$i]['active'] = ($data[$i]['instock']=='0'?0:1);
                $i++;
            }
        }else{
            throw new Exception('file not exist');
        }
        return $data;
    }

}
