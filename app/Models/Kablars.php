<?php
namespace App\Models;
use App\Interfaces\PriceParser;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class Kablars implements PriceParser {
    public array $ranges =[];
    public Spreadsheet $spreadsheet;
    public string $currentFile;

    public function __construct()
    {
        $this->ranges = config('exchange.kablars.ranges');
        $file = $this->copy();
        $this->spreadsheet = IOFactory::load($file->getFile()->getPathname());
    }

    public function get():array{
        $data=[];
        foreach ($this->ranges as $range){

            $res  =  $this->spreadsheet->getActiveSheet()
                ->rangeToArray(
                    $range,     // The worksheet range that we want to retrieve
                    NULL,        // Value that should be returned for empty cells
                    TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                    TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                    FALSE         // Should the array be indexed by cell row and cell column
                );

            $data = array_merge($data, $res);
        }

       return $this->filter($data);
    }


    protected function filter(array $data){

        foreach ($data as $cable){
            $title = str_replace('б/ч','',$cable[0]);
            $price = ((float)str_replace(',','.',$cable[2]))*config('exchange.kablars.price_ratio');
            if ($price){
                $result[]=['title'=>$title, 'price'=>$price, 'active'=>1];
            }
        }

        return $result;
    }

    protected function copy(){
        $filename = 'Price.xlsx';
        $temp = tempnam(sys_get_temp_dir(), $filename);
        copy( config('exchange.kablars.file'), $temp);
        return response()->download($temp, $filename);
    }
}
