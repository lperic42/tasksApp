<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\Task;

class MainController extends Controller
{

    public function save(Request $request){
        // Validate requests
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:12',
        ]);

        // Insert into database
        $admin = new Admin;

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if($save){
            return redirect('/');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function check(Request $request){

        // Validate request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);

        $userInfo = Admin::where('email', '=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail', 'We do not recognize your email address');
        }else{
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/dashboard');
            }else{
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    public function logOut(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }

    public function dashboard(){
        $admin = Admin::where('id', '=', session('LoggedUser'))->first();

        $data = [
            'loggedUserInfo' => Admin::where('id', '=', session('LoggedUser'))->first(),
            'totalTasks' => Task::where('admin_id', $admin->id)->orderBy('created_at', 'desc')->get(),
            'finishedTasks' => Task::where('admin_id', $admin->id)->where('finished', 1)->orderBy('created_at', 'desc')->get(),
            'latestTasks' => Task::where('admin_id', $admin->id)->take(8)->where('finished', 0)->orderBy('created_at', 'desc')->get(),
            'sum' => Task::where('admin_id', $admin->id)->where('finished', 0)->count(),
        ];

        return view('dashboard', $data);
    }
}
