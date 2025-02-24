<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortURLController extends Controller
{
    public function index()
    {
        $urls =  \AshAllenDesign\ShortURL\Models\ShortURL::latest()->get();
        return view('welcome',compact('urls'));
    }

    public function create()
    {
        $bulider = new \AshAllenDesign\ShortURL\Classes\Builder();
        $shortURLObj = $bulider->destinationUrl(request()->url)->make();
        $shortURL = $shortURLObj->default_short_url; 
        return back()->with("success","URL shortened Successfully");
    }
}
