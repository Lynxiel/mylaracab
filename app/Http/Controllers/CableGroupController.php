<?php

namespace App\Http\Controllers;

use App\Http\Requests\CableGroupRequest;
use App\Models\CableGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CableGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CableGroupRequest $request)
    {
        $cableGroup = new CableGroup();
        $cableGroup->title = $request->title;
        $cableGroup-> description  = $request->description;

        if ($request->file('image')){
            $path = Storage::putFile('public',$request->file('image'));
            $url = Storage::url($path);
            $cableGroup->image =$url;
        }
        if ($request->file('files')){
            $path = Storage::putFile('public',$request->file('files'));
            $url = Storage::url($path);
            $cableGroup->files =$url;
        }

        $cableGroup->save();
        return redirect()->action([CableController::class, 'create'])->with('success', 'Успешно создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CableGroup  $cableGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CableGroup $cableGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CableGroup  $cableGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(CableGroup $cableGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CableGroup  $cableGroup
     * @return \Illuminate\Http\Response
     */
    public function update(CableGroupRequest $request, CableGroup $cableGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CableGroup  $cableGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(CableGroup $cableGroup)
    {
        //
    }
}
