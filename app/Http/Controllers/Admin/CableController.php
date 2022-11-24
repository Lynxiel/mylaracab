<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CableRequest;
use App\Models\Cable;
use App\Models\Group;
use Illuminate\Http\Request;

class CableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cables = Cable::with('group')->where('active', '=' , 1)
            ->orderByDesc('group_id')->orderBy('title')->get();

        $groups = Group::all();

        return view('admin.cables',compact('cables', 'groups' ));
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cable = Cable::findOrFail($id);
        $groups  = Group::all();
        return view('admin.cable.edit' ,compact('cable','groups'));
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
//        dd($request->validated());
        Cable::findOrFail($id)->update($request->validated());
        session()->flash('cableUpdated');
        return redirect()->route('cables.edit', $id);

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
