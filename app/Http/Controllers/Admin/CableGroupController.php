<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CableGroupRequest;
use App\Models\CableGroup;
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

        if ($request->file('image')){
            $path = Storage::putFile('public/group_images',$request->file('image'));
            $url = Storage::url($path);
            $data['image'] =$url;
        }
        CableGroup::create($data);
        session()->flash('groupCreated');
        return redirect()->back();
    }


     function edit($id){
        $cablegroup = CableGroup::findOrFail($id);
        return view('admin.cablegroup.edit', compact('cablegroup'));
    }


    public function update(CableGroupRequest $request, $id)
    {
        $data = $request->validated();
        $cableGroup = CableGroup::findOrFail($id);
        if ($request->file('image')){
            $path = Storage::putFile('public/group_images',$request->file('image'));
            $url = Storage::url($path);
            $data['image'] =$url;
        }
        $cableGroup->update($data);
        session()->flash('groupUpdated');
        return Redirect::back();
    }

    public function destroy($id){
        CableGroup::findOrFail($id)->delete();
        session()->flash('groupDeleted');
        return redirect(route('cables.index'));
    }

    public function deleteImage($id){

        $cableGroup = CableGroup::findOrFail($id);
        $cableGroup->image= '';
        $cableGroup->save();
        session()->flash('imageDeleted');
        return redirect()->back();
    }



}
