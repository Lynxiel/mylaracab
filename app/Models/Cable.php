<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cable extends Model
{
    private $cable_id;
    private $quantity;
    private $price;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    use HasFactory;

    /** get all cables with groups and titles
     * @return \Illuminate\Support\Collection
     */
    public static function getAll(){
        return $cables= DB::table('cables')
            ->select('cables.title as cable_title', 'footage', 'coresize', 'corecount', 'cable_groups.title as group_title', 'description', 'price','image'
                ,'cable_groups.cable_group_id as group_id', 'instock', 'cable_id')
            ->join('cable_groups', 'cables.cable_group_id', '=', 'cable_groups.cable_group_id')
            ->orderBy('cables.cable_group_id', 'asc')
            ->get();
    }

    /** Get cables for ids
     * @param  $ids
     */
    public static function getCablesList( $ids){
        return DB::table('cables')
            ->select('*')
            ->whereIN('cable_id' ,$ids)
            ->get();
    }

}
