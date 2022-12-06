<?php

namespace App\Http\Controllers;

use App\Models\Cable;

class SitemapController extends Controller
{
   public function index(){

       $pages = config('sitemap');
      return response()->view('sitemap.sitemap', compact('pages'))->header('Content-Type', 'text/xml');
   }
}

