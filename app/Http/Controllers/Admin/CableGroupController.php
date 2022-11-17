<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CableGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CableGroupController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CableGroupRequest $request)
    {

        $data = $request->validated();

        if ($request->file('cert')){
            $path = Storage::putFile('public/cert',$request->file('cert'));
            $url = Storage::url($path);
            $data['cert'] =$url;
        }
        Group::create($data);
        session()->flash('groupCreated');
        return redirect()->back();
    }


     function edit($id){
        $cablegroup = Group::findOrFail($id);
        return view('admin.cablegroup.edit', compact('cablegroup'));
    }


    public function update(CableGroupRequest $request, $id)
    {
        $data = $request->validated();
        $cableGroup = Group::findOrFail($id);
        if ($request->file('cert')){
            $path = Storage::putFile('public/cert',$request->file('cert'));
            $url = Storage::url($path);
            $data['cert'] =$url;
        }
        $cableGroup->update($data);
        session()->flash('groupUpdated');
        return Redirect::back();
    }

    public function destroy($id){

        Group::findOrFail($id)->delete();
        session()->flash('groupDeleted');
        return redirect(route('cables.index'));
    }

    public function deleteImage($id){
        $cableGroup = Group::findOrFail($id);
        $cableGroup->cert= '';
        $cableGroup->save();
        session()->flash('imageDeleted');
        return redirect()->back();
    }



}
