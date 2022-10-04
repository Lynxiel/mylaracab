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
                //for some reason, laravel update return 0 if nothing is changed!
//                $rowaffected = DB::table('cables')->where('1ccode','=', $row['1cCode'])->update([
//                    'instock'=> $row['quantity'],
//                    'price' =>$row['price'],
//                ]);
                $rawquery = 'UPDATE cables SET price='.  $row['price'] . ', instock='. $row['quantity']. ', active = '. $row['active'] .'
                WHERE `1ccode`="' . $row['1cCode'] .'" ';
                $rowaffected = DB::unprepared($rawquery);
                if (!$rowaffected){
                    DB::insert("insert into cables (title, instock, price, 1ctitle, 1ccode, active)  Values(?, ?, ?, ?, ?, ?)"
                        ,[$row['1ctitle'], $row['quantity'], $row['price'],$row['1ctitle'], $row['1cCode'], $row['active']] );
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
                $data[$i]['active'] = ($data[$i]['quantity']=='0'?0:1);
                $i++;

            }
        }else{
            throw new Exception('file not exist');
        }
        return $data?:null;
    }




}
