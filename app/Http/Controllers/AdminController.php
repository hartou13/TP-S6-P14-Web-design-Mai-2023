<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateur;

class AdminController extends Controller
{
    public function index(){
        return view('loginAdmin');
    }
    public function deconnexion(){
        session()->forget('id');
        return redirect('/admin');
    }
    public function login(Request $request){
        $admin=new Administrateur();
        $admin->email=$request->input('email');
        $admin->mdp=$request->input('mdp');
        $liste=(Administrateur::select("*")->where('email',$admin->email)->where('mdp',$admin->mdp)->get());
        if(count($liste)==1){
            // dd($liste[0]['id']);
            session(['id'=> $liste[0]['id']]);
            return redirect('/');
        }
        else
            return redirect('/admin');
    }
}
