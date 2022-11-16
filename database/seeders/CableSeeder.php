<?php

namespace Database\Seeders;

use App\Models\Exchange;
use Illuminate\Database\Seeder;
use App\Models\Cable;

class CableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Get 1cdata
        $data = (Exchange::getInstance('1c','/exchange/elCabel.xml'))->xmltoArray();
        Cable::upsert($data, '1ccode', ['instock', 'price','active']);
    }


}
