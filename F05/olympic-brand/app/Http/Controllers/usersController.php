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
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = bcrypt($req->input('password'));
        $user->isAdmin = ($req->input('isAdmin'));


        $user->save();


        toast('Registration Successful','success');
        return redirect()->route('signup');
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Retrieve the user from the database
        $user = usersModel::where('email', $email)->first();
        $user_id = $request->session()->get('id');


        // dd($user);
        if ($user) {
            // Email exists
            if (Hash::check($password, $user->password)) {
                // Password is correct
                $request->session()->put('id', $user->user_id);

                //view depending on access
                if ($user->isAdmin == "user") {

                    $request->session()->regenerate();
                    $request->session()->put('id', $user->id);

                    toast('Login Successful','success');
                    return redirect()->route('Index');

                } else {

                    echo"This is the admin Home";

                    // $request->session()->regenerate();
                    // $request->session()->put('role', $user->role);

                    // toast('Login Successful','success');
                    // return redirect()->route('adminHome');

                }
            } else {
                // Incorrect password
                toast('Incorrect Password','error');
                return redirect()->back();
            }
        } else {
            // If the email doesn't exist
            toast('Account Does Not Exist','error');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        //use get for logout not post
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
