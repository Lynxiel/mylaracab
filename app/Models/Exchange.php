<?php

namespace App\Models;

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;
use Exception;
use phpDocumentor\Reflection\Types\Self_;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Exchange
{
    protected static array $instance=[];
    public string $filepath;

    protected function __construct(string $filepath){
        $this->filepath = $filepath;
    }

    public static function getInstance(int|string $key, string $filepath): self
    {
        if (!array_key_exists($key, self::$instance)) {
            self::$instance[$key] = new self($filepath);

        }
        return self::$instance[$key];
    }

    public function xmltoArray():?array{
        $data =[];
        if (file_exists(public_path($this->filepath))) {
            $xml = simplexml_load_file(public_path($this->filepath));
            $i=0;
            foreach ($xml as $node){
                $data[$i]['1ccode']= $node->Code->__toString();
                $data[$i]['title'] = $node->ProductName->__toString();
                $data[$i]['instock'] = (int)$node->Quantity->__toString();
                $data[$i]['price'] = ((float)$node->Price->__toString()*0.9); // Special price from 1c price
                $data[$i]['active'] = ($data[$i]['instock']=='0'?0:1);
                $i++;

            }
        }else{
            throw new Exception('file not exist');
        }
        return $data?:null;
    }

    public function copyExternalFile($link){
        $filename = 'arsenalPrice.xlsx';
        $temp = tempnam(sys_get_temp_dir(), $filename);
        copy($link, $temp);

        return response()->download($temp, $filename);
    }


}
