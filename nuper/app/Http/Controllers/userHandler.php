<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userlist;
use Illuminate\Support\Facades\DB;

class userHandler extends Controller
{
    //
    function newUser(Request $req){
        function checkUsername($username){
            if (!empty($username)){
                $pattern="/\s/i";
                if (preg_match($pattern, $username)==0){
                    $pattern = "/\b[a-z]+([a-z]*|[0-9]*)*/i";
                    if (preg_match($pattern, $username)==1){
                        $users = DB::select("select * from userlists where username='$username'");
                        if (!empty($users)){
                            return False;
                        }
                        return True;
                    }
                }
            }
            return False;
        }
    
        function checkEmail($email){
            if (!empty($email)){
                $pattern="/\s/i";
                if (preg_match($pattern, $email)==0){
                    $pattern = "/\b[a-z]([a-z]|[0-9])*@[a-z]+[.][a-z]([a-z]*|([.][a-z]))*/i";
                    if (preg_match($pattern, $email)==1){
                        $users = DB::select("select * from userlists where email='$email'");
                        if (!empty($users)){
                            return False;
                        }
                        return True;
                        #verify email via otp
                    }
                }
            }
            return False;
        }
    
        function checkPassword($password){
            if (!empty($password)){
                $pattern="/\s/i";
                if (preg_match($pattern, $password)==0){
                    if (strlen($password)<6){
                        return False;
                    }
                    return True;
                }
            }
            return False;
        }
        $name=$req->username;
        $mail=$req->email;
        $password=$req->password;
        if (checkUsername($name)){
            if (checkEmail($mail)){
                if (checkPassword($password)){
                    $data= new userlist;
                    $data->username=$req->username;
                    $data->email=$req->email;
                    $data->password=$req->password;
                    $data->type='REG';
                    $data->save();
                    return redirect('home');
                }
                else{
                    $error=3;
                    return redirect ("error/$error");
                }
            }
            else{
                $error=2;
                return redirect ("error/$error");
            }
        }
        else{
            $error=1;
            return redirect ("error/$error");
        }

    }
    function error($error){ #you can define the errors better if you want
        if ($error==1){
            return view ('error',['error'=>'Invalid username!! Try another username!']);
        }
        if ($error==2){
            return view ('error',['error'=>'Invalid Email try again!!']);
        }
        if ($error==3){
            return view ('error',['error'=>'Invalid password!! Has to be atleast 6 digit long']);
        }
        return view ('error',['error'=>'Do not know what went wrong..']);
    }
}
