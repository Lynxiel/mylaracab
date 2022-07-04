<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use Illuminate\Http\Request;

class CableController extends Controller
{
    public function index(){
        $cables=Cable::all()->sortBy('title');
        return view('cables',compact('cables'));
    }
}
