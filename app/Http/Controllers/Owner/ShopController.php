<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Shop;

class ShopController extends Controller
{
    public function __construct()
     {
        $this->middleware('auth:owners');

        $this->middleware(function($request,$next){
         //dd($request->route()->parameter('shop')); //文字列
         //dd(Auth::id()); //数字
         $id = $request->route()->parameter('shops');
         if(!is_null($id)){
            $shopsOwnerId = Shop::findOrFail($id)->owner->id;
            $shopId = (int)$shopsOwnerId;
            $ownerId = Auth::id();
               if($shopId !== $ownerId){
                  abort(404);
              }
         }
         
         return $next($request);
        });
     }

      public function index()
     {
        $shops = Shop::where('owner_id',Auth::id())->get();

        return view('owner.shops.index',compact('shops'));
     }

     public function edit($id)
    {
        dd(Shop::findOrFail($id));
    }

    public function update(Request $request, $id)
    {

    }
}
