<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
                $rawquery = 'UPDATE cables SET price='.  $row['price'] . ', instock='. $row['quantity']. ',
                active = '. $row['active'] .', updated_at = "'. date('y-m-d H:i:s') . '"
                WHERE `1ccode`="' . $row['1cCode'] .'" ';
                $rowaffected = DB::unprepared($rawquery);
                if (!$rowaffected){
                    DB::insert("insert into cables (title, instock, price, 1ctitle, 1ccode, active)  Values(?, ?, ?, ?, ?, ?)"
                        ,[$row['1ctitle'], $row['quantity'], $row['price'],$row['1ctitle'], $row['1cCode'], $row['active']] );
                }
            }
        }


        // Arsenal
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path('/exchange/price.xlsx'));
        $sheet = $spreadsheet->getActiveSheet();
        $val = $sheet->getCellCollection();
        $val = $sheet->getCell('A5');
        dd($val);

        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
    }


    public function xmltoArray(string $filepath):?array{
        $data =[];
        if (file_exists($filepath)) {
            $xml = simplexml_load_file($filepath);
            $i=0;
            foreach ($xml as $node){
                $data[$i]['1cCode']= $node->Code->__toString();
                $data[$i]['1ctitle'] = $node->ProductName->__toString();
                $data[$i]['quantity'] = (int)$node->Quantity->__toString();
                $data[$i]['price'] = ((float)$node->Price->__toString()*0.9); // Special price from 1c price
                $data[$i]['active'] = ($data[$i]['quantity']=='0'?0:1);
                $i++;

            }
        }else{
            throw new Exception('file not exist');
        }
        return $data?:null;
    }




}
