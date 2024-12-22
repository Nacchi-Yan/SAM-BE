<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
class usersController extends Controller
{
    public function register(Request $req)
    {
        // Validate the request data as needed...
        $user = new usersModel();
        $user->username = $req->input('username');
        $user->email = $req->input('email');
        $user->password = bcrypt($req->input('password'));


        $user->save();


        toast('Registration Successful','success');
        // return redirect()->route('login');
    }
    // public function login(Request $request)
    // {
    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     // Retrieve the user from the database
    //     $user = userModel::where('email', $email)->first();
    //     $user_id = $request->session()->get('user_id');


    //     // dd($user);
    //     if ($user) {
    //         // Email exists
    //         if (Hash::check($password, $user->password)) {
    //             // Password is correct
    //             $request->session()->put('user_id', $user->user_id);

    //             //view depending on access
    //             if ($user->role == "guest") {

    //                 $request->session()->regenerate();
    //                 $request->session()->put('role', $user->role);

    //                 toast('Login Successful','success');
    //                 return redirect()->route('home');

    //             }if ($user->role == "consultant") {

    //                 $request->session()->regenerate();
    //                 $request->session()->put('role', $user->role);

    //                 toast('Login Successful','success');
    //                 return redirect()->route('consultantHome');

    //             } else {

    //                 $request->session()->regenerate();
    //                 $request->session()->put('role', $user->role);

    //                 toast('Login Successful','success');
    //                 return redirect()->route('adminHome');

    //             }
    //         } else {
    //             // Incorrect password
    //             toast('Incorrect Password','error');
    //             return redirect()->back();
    //         }
    //     } else {
    //         // If the email doesn't exist
    //         toast('Account Does Not Exist','error');
    //         return redirect()->back();
    //     }
    // }

    // public function logout(Request $request)
    // {
    //     //use get for logout not post
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect()->route('login');
    // }
}
