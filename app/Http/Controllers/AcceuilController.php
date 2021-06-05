<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;


class AcceuilController extends Controller
{
    public function index()
    {
        $var_test = "test de passage paremtré au view";
        $nom = "fakhri";
        $sectors = DB::table('sectors')->orderBy('created_at','desc')->limit(3)->get();
        return view('index',[
            "sectors"=>$sectors
        ]);
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function save_contact(Request $request){
        Contact::create($request->all());
        return redirect()->route('index');
    }
}
