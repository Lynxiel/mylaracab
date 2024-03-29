<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


         Group::insert([
             [
                 'title' => 'ВВГнг',
                 'description' => 'ВВГнг - плоский силовой кабель с однопроволочными медными жилами и изоляцией из ПВХ, не поддерживает горение.Используется для стационарной одиночной или групповой прокладки и распределения энергии в низковольтных сетях напряжением до 660В. Температура эксплуатации от -50С до +50.',
             ],[
                 'title'=>'ШВВП',
                 'description'=>'ШВВП - гибкий плоский шнур с многопроволочными медными жилами с изоляцией из ПВХ. Применяется для подключения бытовых приборов и систем освещения к электросети с напряжением до 380В. Имеет 2 или 3 токопроводящие жилы. Температура эксплуатации от -40С до +40С.'
             ],[
                 'title'=>'ПВС',
                 'description'=>'ПВС - круглый гибкий соединительный провод с многопроволочными медными жилами с изоляцией из ПВХ. Применяется для подключения бытовых приборов и систем освещения к электросети с напряжением до 380В.  Температура эксплуатации от -40С до +40С.'
             ],[
                 'title'=>'СИП',
                 'description'=>'СИП - самонесущий алюминиевый изолированный провод. Используется для подключения жилых и промышленных зданий к электросети напряжением до 35кВ. Крепится на воздушные опоры с помощью специальных анкеров и натягивается между ними. Температура эксплуатации от — 60 °С до + 50 °С'

             ]
         ]);


    }


}
