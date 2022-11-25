<?php

namespace Database\Seeders;

use App\Models\Exchange;
use App\Models\Kablars;
use App\Models\Kab1c;
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
        $data = (new Exchange( new Kab1c() ))->get();
        Cable::upsert($data, '1ccode', ['instock', 'price','active']);

        // Get kablars data
        $data = (new Exchange( new Kablars()))->get();
        Cable::upsert($data, 'title', ['price']);

    }


}

