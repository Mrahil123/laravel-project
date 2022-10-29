<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{   
    // register form
    public function register(){
        return view("users.register");
    }

    // store user datas
    public function store(Request $req){
        $inputFields = $req->validate([
            "name"=>["required","min:3"],
            "email"=>["required","email"],
            "password"=>"required|confirmed|min:6"
        ]);
        // dd($inputFields["photo"]);

        if($req->hasFile("photo")){
            $inputFields["photo"] = $req->file("photo")->store("photos","public");
        }

        $inputFields["password"] = bcrypt($inputFields["password"]);

        $user = User::create($inputFields);

        auth()->login($user);

        return redirect("/")->with("done","Account Created Admin Review");
    }

    // admin user manage panel 
    public function viewUsers(){
        return view("users.viewusers",[
            "users"=>User::all()
        ]);
    }

    // login
    public function login(){
        return view("users.login");
    }

    // authenticate
    public function authenticate(Request $req){
        $inputFields = $req->validate([
            "email"=>["required","email"],
            "password"=>"required"
        ]);
        
        if(auth()->attempt($inputFields)){

            $req->session()->regenerate();

            return redirect("/");
        }

        return back();
    }

    // log out
    public function logout(Request $req){
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect("/");
    }

    // update user is_approved if approved admin
    public function update(User $user){

        $user->update(["is_approved"=>"1"]);

        return back();
    }

    // delete user if deny
    public function delete(User $user){
        $user->delete();
        return back();
    }

    // upload file from user dashboard
    public function upload(User $user,Request $req){

        $inputFields = $req->validate([
            "photo"=>"required"
        ]);

        if($req->hasFile("photo")){
            $inputFields["photo"] = $req->file("photo")->store("photos","public");
        }; 

        $user->update($inputFields);

        return back();
    }

}
