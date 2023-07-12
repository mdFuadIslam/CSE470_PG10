<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\active;
use App\Models\rent;
use App\Models\sale;

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
}
