<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thread;
use App\Models\threadcomment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ban;

class ForumManagement extends Controller
{
    //
    function thread(){
        $data = DB::select("select * from threads");
        return view("threads",['data'=>$data]);
    }
    function createThread(Request $request){
        $data=new thread;
        $data->username=Auth::user()->name;
        $data->threadName=$request->threadName;
        $data->threadContent=$request->threadContent;
        $data->save();
        $info=DB::table('threads')->where([['threadName',$request->threadName],['threadContent',$request->threadContent],['username',Auth::user()->name]])->first();
        $id=$info->threadID;
        $datatwo=new threadcomment;
        $datatwo->threadID=$id;
        $datatwo->save();
        return redirect("thread");
    }
    function threadView($id){
        if (Auth::check()){
            $username=Auth::user()->name;
            $bannedUsers = DB::table('bans')->where('threadID', $id)->get();
            foreach ($bannedUsers as $bannedUser){
                $User=$bannedUser->username;
                if ($username==$User){
                    return redirect('home');
                    #say no access for you
                }
            }
            $ownerInfo=DB::table('threads')->where('threadID', $id)->first();
            $owner=$ownerInfo->username;
            $data = DB::select("select * from threadcomments left join threads on threads.threadID=threadcomments.threadID where threads.threadID='$id'");
            if ($owner==$username){
                return view("threadViewOwner",['data'=>$data]);
            }
            return view("threadView",['data'=>$data]);
        }
        else{
            $data = DB::select("select * from threadcomments left join threads on threads.threadID=threadcomments.threadID where threads.threadID='$id'");
            return view("threadView",['data'=>$data]);
        }
    }
    function comment(Request $request){
        $data=new threadcomment;
        $data->commenter=Auth::user()->name;
        $data->comment=$request->threadComment;
        $data->threadID=$request->threadID;
        $data->save();
        $id=$request->threadID;
        return redirect("thread/$id");
    }
    function deleteThread(Request $request){
        $deleted = DB::table('threads')->where('threadID',$request->id)->delete();
        $deletedtwo = DB::table('threadcomments')->where('threadID',$request->id)->delete();
        return redirect('thread');
    }
    function ban(Request $request){
        $data= new ban;
        $data->threadID=$request->id;
        $id=$request->id;
        $data->username=$request->username;
        $data->save();
        return redirect("thread/$id");
    }
    function latestThread(){
        $data = DB::select("select * from threads order by updated_at desc");
        return view("threads",['data'=>$data]);
    }
    function oldestThread(){
        $data = DB::select("select * from threads order by updated_at");
        return view("threads",['data'=>$data]);
    }
    function searchThread(Request $request){
        $name=$request->searchName;
        $data = DB::select("select * from threads where threadName='$name'");
        return view("threads",['data'=>$data]);
    }
}
