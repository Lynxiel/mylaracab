<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cables= DB::table('cables')
            ->select('cables.title as cable_title', 'footage', 'coresize', 'corecount', 'cable_groups.title as group_title', 'description', 'price','image'
            ,'cable_groups.cable_group_id as group_id', 'instock')
            ->join('cable_groups', 'cables.cable_group_id', '=', 'cable_groups.cable_group_id')
            ->orderBy('cables.cable_group_id', 'asc')
            ->get();


        //dd($cables);


//        $cables = Cable::join('cable_groups','cables.cable_group_id', '=', 'cable_groups.cable_group_id')
//            ->orderBy('cable_groups.title','desc')
//            ->paginate('60');
        return view('cables',compact('cables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
