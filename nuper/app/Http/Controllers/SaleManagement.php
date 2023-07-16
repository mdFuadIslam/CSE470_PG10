<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\active;
use App\Models\rent;
use App\Models\cart;
use App\Models\sale;
use App\Models\wishlist;

class SaleManagement extends Controller
{
    function createSale(Request $req){
        $data= new Sale;
        $username=$req->username;
        $data->username=$req->username;
        $data->name=$req->name;
        $data->price=$req->price;
        $data->description=$req->description;
        $data->imgUrl=$req->img;
        $data->imgUrl2=$req->img2;
        $data->imgUrl3=$req->img3;
        $data->imgUrl4=$req->img4;
        $data->imgUrl5=$req->img5;
        $data->save();
        return redirect("/dashboard");
    }
    function showProduct($id){
        $data=DB::select("select * from sales where saleId='$id' limit 1");
        return view("productView",['product'=>$data]);
    }
    function addToCart(Request $request){
        $data= new cart;
        $data->username=$request->username;
        $data->pId=$request->pId;
        $pid=$request->pId;
        $data->price=$request->price;
        $data->name=$request->name;
        $data->duration=$request->duration;
        $data->type=$request->type;
        $data->save();
        return redirect("productView/$pid");
    }
    function cart(){
        $user=Auth::user();
        $username=$user->name;
        $data=DB::select("select * from carts where username='$username'");
        return view('cart',['data'=>$data]);
    }
    function addToWishlist(Request $request){
        $datathree=DB::table('wishlists')->where('pId', $request->pId)->where('username', $request->username)->get();
        #echo $datathree;
        if ($datathree->isEmpty()){
            $data= new wishlist;
            $data->username=$request->username;
            $data->pId=$request->pId;
            $id=$request->pId;
            $type=$request->type;
            if ($type==0){
                $datatwo=DB::table('sales')->where('saleId', $id)->first();
                $count=$datatwo->wishlist;
                #$count=int($count);
                $count=$count+1;
                #$count=str($count);
                $dataone=DB::table('sales')->where('saleId',$id)->update(['wishlist'=>$count]);
            }
            $data->save();
        }
        return redirect("productView/$request->pId");
    }
}
