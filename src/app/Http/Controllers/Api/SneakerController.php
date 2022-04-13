<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SneakerController extends Controller
{
    public function getSneakers(Request $request)
    {
        if ($request->has('user_id')) {
            $query = Models\Products\Sneaker::where('user_id', $request->user_id);        
        $sneakers = $query->get();
        return response()->json(compact('sneakers'));
        }
        return response()->json(array("message"=>"No user id given"));
    }
    public function storeSneaker(Requests\StoreSneakerRequest $request)
    {
        if($request->id){
            $sneaker = Models\Products\Sneaker::find($request->id);
        }
        else {
            $sneaker = new Models\Products\Sneaker;
        }
        $sneaker->fill($request->validated());
        $sneaker->save();
        return response()->json(array("message"=>"Saved successfully"));
    }
}
