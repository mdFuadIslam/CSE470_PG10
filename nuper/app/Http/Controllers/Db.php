<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userlist;

class Db extends Controller
{
    //
    function addToTable(Request $req){
        $data= new userlist;
        $data->username=$req->username;
        $data->email=$req->email;
        $data->password=$req->password;
        $data->type='REG';
        $_SESSION['username']=$data->username;
        $data->save();
        return redirect('/');

    }
}
