<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\pendingbusinessapplication;
use App\Models\active;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    function createBusiness(Request $req){
        $data= new pendingBusinessApplication;
        $username=$req->username;
        $data->username=$req->username;
        $data->name=$req->businessname;
        $data->address=$req->address;
        $data->picture=$req->img;
        $data->proof=$req->file;
        $data->save();
        return redirect("/application");
    }

    function application(Request $request){
        $user = $request->user();
        $name=$user->name;
        if ($name=='Admin'){
            #send all pending ones
            $data = DB::select("select * from pendingbusinessapplications where status=0");
            return view("application",['data'=>$data]);
        }
        else{
            $data = DB::select("select * from pendingbusinessapplications where username='$name'");
           return view("application",['data'=>$data]);
        }
    }

    function approval(Request $request){
        $id = $request->id;
        $status=$request->status;
        $dataone=DB::table('pendingbusinessapplications')->where('application_id',$id)->update(['status'=>$status]);
        if ($status=='1'){
            $datatwo= new active;
            $datatwo->username=$request->username;
            $datatwo->businessname=$request->names;
            $datatwo->location=$request->address;
            $datatwo->picture=$request->picture;
            $datatwo->save();
        }
        $data = DB::select("select * from pendingbusinessapplications where status=0");
        return redirect("application");
    }

    function active(Request $request){
        $user = $request->user();
        $name=$user->name;
        if ($name=='Admin'){
            #figure out later
            return redirect('dashboard');
        }
        else{
            $data = DB::select("select * from actives where username='$name'");
           return view("active",['data'=>$data]);
        }
    }
}
