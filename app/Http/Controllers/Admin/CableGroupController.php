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
    public function createGroup(CableGroupRequest $request)
    {
        $group = $request->only('title','description','image');
        if ($request->file('image')){
            $path = Storage::putFile('public/group_images',$request->file('image'));
            $url = Storage::url($path);
            $group->image =$url;
        }
        CableGroup::create($group);

       return Redirect::back();
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateGroup(Request $request)
    {

        $data = $request->all();
        $cableGroup = CableGroup::find($data['cable_group_id']);
        if ($cableGroup){
            $cableGroup->title = $data['title'];
            $cableGroup->description = $data['description'];
            if ($request->file('image')){
                $path = Storage::putFile('public/group_images',$request->file('image'));
                $url = Storage::url($path);
                $cableGroup->image =$url;
            }
            $cableGroup->save();
            return Redirect::back();

        }
        return Redirect::back()->with('error','Возникла ошибка, попробуйте еще раз');

    }

    public function deleteImage(Request $request){

        $data = $request->all();
        $cableGroup = CableGroup::find($data['cable_group_id']);
        if ($cableGroup && isset($data['image'])){
            Storage::delete($data['image']);
            $cableGroup->image= '';
            $cableGroup->save();
        }

    }



}
