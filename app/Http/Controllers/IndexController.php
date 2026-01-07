<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    // dd(Listing::all());
    public function index()
    {
        return inertia('Index/Index',
        [
            'message' => 'Hello from IndexController@index'
            ]); 
        
    }
    public function show(){
        return inertia ('Index/Show');
    }
}
