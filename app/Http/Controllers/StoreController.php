<?php

namespace App\Http\Controllers;

use App\Models\Store;

class StoreController extends Controller
{   
    public function index(){
        $stores = Store::all();
        return view('store.index',compact('stores'));
    }
    

}
