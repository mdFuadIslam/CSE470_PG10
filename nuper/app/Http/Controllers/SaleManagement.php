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
use App\Models\requestlist;

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
        $type=$request->type;
        $data->save();
        if ($type==0){
            return redirect("productView/$pid");
        }
        if ($type==1){
            return redirect("rentView/$pid");
        }
    }
    function cart(){
        $user=Auth::user();
        $username=$user->name;
        $data=DB::select("select * from carts where username='$username'");
        return view('cart',['data'=>$data]);
    }
    function addToWishlist(Request $request){
        $type=$request->type;
        $datathree=DB::table('wishlists')->where('pId', $request->pId)->where('username', $request->username)->where('type',$type)->get();
        if ($datathree->isEmpty()){
            $data= new wishlist;
            $data->username=$request->username;
            $data->pId=$request->pId;
            $data->type=$request->type;
            $id=$request->pId;
            if ($type==0){
                $datatwo=DB::table('sales')->where('saleId', $id)->first();
                $count=$datatwo->wishlist;
                #$count=int($count);
                $count=$count+1;
                #$count=str($count);
                $dataone=DB::table('sales')->where('saleId',$id)->update(['wishlist'=>$count]);
            }
            if ($type==1){
                $datatwo=DB::table('rents')->where('rentID', $id)->first();
                $count=$datatwo->wishlist;
                #$count=int($count);
                $count=$count+1;
                #$count=str($count);
                $dataone=DB::table('rents')->where('rentID',$id)->update(['wishlist'=>$count]);
            }
        }
        $data->save();
        if ($type==0){
            return redirect("productView/$request->pId");
        }
        if ($type==1){
            return redirect("rentView/$request->pId");
        }
        
    }
    function createRent(Request $req){
        $data= new rent;
        $username=$req->username;
        $data->username=$req->username;
        $data->duration=$req->duration;
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
    function showRent($id){
        $data=DB::select("select * from rents where rentID='$id' limit 1");
        return view("rentView",['product'=>$data]);
    }
    function productPage(){
        $data=DB::select("select * from sales");
        return view("products",['sellProducts'=>$data]);
    }
    function rentPage(){
        $data=DB::select("select * from rents");
        return view("rents",['rentProducts'=>$data]);
    }
    function request(){
        $data = DB::select("select * from requestlists");
        return view("request",['data'=>$data]);
    }
    function createRequest(Request $request){
        $data=new requestlist;
        $data->username=Auth::user()->name;
        $data->requestName=$request->requestName;
        $data->description=$request->requestContent;
        $data->price=$request->price;
        $data->save();
        return redirect("request");
    }
    function requestView($id){
        $data = DB::select("select * from requestlists where rID='$id'");
        return view("requestView",['data'=>$data]);
    }
    function bSellItem(Request $req){
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
}
