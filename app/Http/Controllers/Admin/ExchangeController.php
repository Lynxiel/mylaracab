<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
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
    public function index(){

        try {
            $data = $this->xmltoArray(public_path('/exchange/elCabel.xml'));
            if ($data){
                dd($data);
                foreach ($data as $row){
                    //for some reason, laravel update return 0 if nothing is changed!
//                $rowaffected = DB::table('cables')->where('1ccode','=', $row['1cCode'])->update([
//                    'instock'=> $row['quantity'],
//                    'price' =>$row['price'],
//                ]);
                    $rawquery = 'UPDATE cables SET price='.  $row['price'] . ', instock='. $row['quantity']. ',
                active = '. $row['active'] .', updated_at = "'. date('y-m-d H:i:s') . '"
                WHERE `1ccode`="' . $row['1cCode'] .'" ';

                    $rowaffected = DB::update($rawquery);
                    if (!$rowaffected){
                        DB::insert("insert into cables (title, instock, price, 1ctitle, 1ccode, active)  Values(?, ?, ?, ?, ?, ?)"
                            ,[$row['1ctitle'], $row['quantity'], $row['price'],$row['1ctitle'], $row['1cCode'], $row['active']] );
                    }
                }
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
            MailController::ExchangeError($e->getMessage());
        }

        // Arsenal
        try {
            //get file by link
            $price = $this->copyExternalFile('https://www.kabelarsenal.ru/price.xlsx');
            //dd($price->getFile()->getPathname());
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($price->getFile()->getPathname());

            $rowstart = 5;
            $rowend=$spreadsheet->getActiveSheet()->getHighestRow();

            $dataArray1 = $spreadsheet->getActiveSheet()
                ->rangeToArray(
                    "A$rowstart:C$rowend",     // The worksheet range that we want to retrieve
                    NULL,        // Value that should be returned for empty cells
                    TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                    TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                    TRUE         // Should the array be indexed by cell row and cell column
                );

            dd($dataArray1);

            $dataArray2 = $spreadsheet->getActiveSheet()
                ->rangeToArray(
                    "F$rowstart:G$rowend",     // The worksheet range that we want to retrieve
                    NULL,        // Value that should be returned for empty cells
                    TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                    TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                    TRUE         // Should the array be indexed by cell row and cell column
                );


            $dataArray3= $spreadsheet->getActiveSheet()
                ->rangeToArray(
                    "K$rowstart:M$rowend",     // The worksheet range that we want to retrieve
                    NULL,        // Value that should be returned for empty cells
                    TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                    TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                    TRUE         // Should the array be indexed by cell row and cell column
                );

            $dataArray4 = $spreadsheet->getActiveSheet()
                ->rangeToArray(
                    "P$rowstart:R$rowend",     // The worksheet range that we want to retrieve
                    NULL,        // Value that should be returned for empty cells
                    TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                    TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                    TRUE         // Should the array be indexed by cell row and cell column
                );


            $dataArray = array_merge($dataArray1,$dataArray2, $dataArray3,$dataArray4 );

            $dataArray = array_unique($dataArray, SORT_REGULAR);
            dd($dataArray);


        }
        catch (Exception $e){
            echo $e->getMessage();
            MailController::ExchangeError($e->getMessage());
        }




    }






}
