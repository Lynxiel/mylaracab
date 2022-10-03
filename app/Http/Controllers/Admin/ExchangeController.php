<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CableRequest;
use App\Models\Cable;
use App\Models\CableGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class ExchangeController extends Controller
{

    public array $products;
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){


        $data = $this->xmltoArray(public_path('/exchange/elCabel.xml'));
        if ($data){
            foreach ($data as $row){
                $rowaffected = DB::update ('update cables SET instock=?, price=? where 1ccode = ?',
                    [ $row['quantity'], $row['price'], $row['1cCode']]);
                if (!$rowaffected){
                    DB::insert("insert into cables (title, instock, price, 1ctitle, 1ccode)  Values(?, ?, ?, ?, ?)"
                        ,[$row['1ctitle'], $row['quantity'], $row['price'],$row['1ctitle'], $row['1cCode']] );
                }
            }
        }
    }


    public function xmltoArray(string $filepath):?array{
        $data =[];
        if (file_exists($filepath)) {
            $xml = simplexml_load_file($filepath);
            $i=0;
            foreach ($xml as $node){
                $data[$i]['1cCode']= $node->Code->__toString();
                $data[$i]['1ctitle'] = $node->ProductName->__toString();
                $data[$i]['quantity'] = $node->Quantity->__toString();
                $data[$i]['price'] = $node->Price->__toString();
                $i++;

            }
        }else{
            throw new Exception('file not exist');
        }
        return $data?:null;
    }




}
