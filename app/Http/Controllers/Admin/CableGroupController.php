<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CableGroupRequest;
use App\Http\Requests\CableRequest;
use App\Models\Cable;
use App\Models\CableGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;

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
        $cableGroup = new CableGroup();
        $cableGroup->title = $request->title;
        $cableGroup-> description  = $request->description;

        if ($request->file('image')){
            $path = Storage::putFile('public/group_images',$request->file('image'));
            $url = Storage::url($path);
            $cableGroup->image =$url;
        }
        if ($request->file('files')){
            $path = Storage::putFile('public/group_images',$request->file('files'));
            $url = Storage::url($path);
            $cableGroup->files =$url;
        }

        $cableGroup->save();
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
