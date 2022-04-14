<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SneakerController extends Controller
{
    public function getSneakers(Request $request)
    {
        if ($request->has('user_id')) {
            $query = Models\Sneaker::where('user_id', $request->user_id);        
        $sneakers = $query->get();
        return response()->json(compact('sneakers'));
        }
        return response()->json(array("message"=>"No user id given"));
    }

    public function storeSneaker(Requests\StoreSneakerRequest $request)
    {
        
        $sneaker = new Models\Sneaker;
        $sneaker->fill($request->validated());

        if ($request->hasFile('invoice')) {
            $uid = Str::uuid();
            $fileExt = $request->file("invoice")->extension();

            $sneaker->invoice="invoice_".$uid.'.'.$fileExt;
            $request->file("invoice")->storeAs(
                'public/img/invoices',
                $sneaker->invoice
            );
        }
        else {
            $sneaker->invoice ="invoice_example.png";
        }
        $sneaker->save();
        return response()->json(array("message"=>"Saved successfully"));
    }

    public function deleteSneaker(Request $request)
    {
        if ($request->has('id')) {
            $query = Models\Sneaker::where('id', $request->id)->delete();      
            return response()->json(array("message"=>"Sneaker deleted"));
        }
        return response()->json(array("message"=>"No sneaker id given"));
    }

    public function addTokens(Request $request)
    {
        
        $user = Models\User::where('id', $request->user_id)->first();
        $user->tokens = $request->amount;
        $user->save();
        return response()->json(array("message"=> compact('user')));
    }

    public function getTokens(Request $request)
    {
        $data = Models\User::where('id', $request->user_id)->select('tokens')->get();
        return response()->json(compact('data'));
    }
    
}
