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
use App\Models\trade;
use App\Models\invoice;

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
        $data->type=$request->type;
        $type=$request->type;
        $data->save();
        return redirect('cart');
        #if ($type==0){
        #    return redirect("productView/$pid");
        #}
        #if ($type==1){
        #    return redirect("rentView/$pid");
        #}
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
    function tradeItem(Request $request){
        $data= new trade;
        $data->username=$request->username;
        $data->tUsername=$request->tUsername;
        $data->name=$request->name;
        $data->tName=$request->tName;
        $data->img=$request->img;
        $data->tImg=$request->tImg;
        $data->save();
        return redirect('trades');
    }
    function trades(){
        $user=Auth::user()->name;
        $data=DB::select("Select * from trades where username='$user' or tUsername='$user'");
        return view('trade',['data'=>$data]);
    }
    function tradeApproval(Request $req){
        $dataone=DB::table('trades')->where('id',$req->id)->update(['status'=>$req->status]);
        return redirect ('trades');
    }
    function payment(Request $req){
        $type=$req->pay;
        if ($type=='pay with bkash'){
            return view ('payWithBkash',['total'=>$req->total]);
        }
        else if ($type=='pay in installment'){
            return view ('payWithCard',['total'=>$req->total]);
        }
    }
    function bkash(Request $req){
        $user=Auth::user()->name;
        $data=DB::select("select * from carts where username='$user'");
        return view('bkash',['data'=>$data,'number'=>$req->number,'trxId'=>$req->trxID]);
    }
    function bkashInvoice(Request $req){
        $user=Auth::user()->name;
        $dataone=DB::select("select * from carts where username='$user'");
        foreach($dataone as $item){
            $data=new invoice;
            $data->username=$user;
            $data->productName=$item->name;
            $data->price=$item->price;
            $data->type=$item->type;
            $type=$item->type;
            $data->duration=$item->duration;
            $data->pay=$item->price;
            $data->due=0;
            $id=$item->pId;
            if ($type==0){
                $deleted=DB::table('sales')->where('saleId',$id)->delete();
            }
            else if ($type==1){
                $deleted=DB::table('rents')->where('rentId',$id)->delete();
            }
        }
        $deleted=DB::table('carts')->where('username',$user)->delete();
        return redirect('home');
    }
    function wishlist(){
        $user=Auth::user();
        $username=$user->name;
        $dataone=DB::select("select * from wishlists left join sales on wishlists.pId=sales.saleId where wishlists.username='$username' and wishlists.type='0'");
        $datatwo=DB::select("select * from wishlists left join rents on wishlists.pId=rents.rentID where wishlists.username='$username' and wishlists.type='1'");
        return view('wishlist',['dataone'=>$dataone,'datatwo'=>$datatwo]);
    }
    function installmentsInvoice(Request $req){
        $user=Auth::user()->name;
        $data=DB::select("select * from carts where username='$user'");
        return view('installmentsInvoice',['data'=>$data,'cnumber'=>$req->cnumber,'cvv'=>$req->cvv,'date'=>$req->date]);
    }
}
