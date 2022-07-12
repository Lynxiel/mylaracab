<?php

namespace App\Http\Controllers;

use App\Http\Requests\CableRequest;
use App\Models\Cable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            ,'cable_groups.cable_group_id as group_id', 'instock', 'cable_id')
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
        return view('cablesadmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CableRequest $request)
    {
        $cable = new Cable();
        $cable->title = $request->title  ;
        $cable-> cable_group_id  = $request->cable_group_id;
        $cable->footage = $request->footage;
        $cable->coresize= $request->coresize;
        $cable->corecount = $request->corecount;
        $cable->capacity = $request->capacity;
        $cable->instock = $request->instock;
        $cable->price = $request->price;
        if ($request->file('img')){
            $path = Storage::putFile('public',$request->file('img'));
            $url = Storage::url($path);
            $cable->file =$url;
        }

        $cable->save();
        return redirect()->action([CableController::class, 'create'])->with('success', 'Успешно создано');
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
    public function update(CableRequest $request, $id)
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
