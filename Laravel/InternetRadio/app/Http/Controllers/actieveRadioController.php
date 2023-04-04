<?php

namespace App\Http\Controllers;

use App\Models\Actief;
use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\View\View;

class actieveRadioController extends Controller
{
    

    function index(){
        $uploads = Upload::all();
        $actief = Actief::first();
        
        return view("index")->with('actief', $actief)->with('uploads', $uploads);
    }

    function volgende(){
        
        $actief = Actief::first();
        if($actief->actief >= Upload::count()){
            
            $actief->actief = 1;
        }else{
            $actief = $actief->actief + 1;
        }
        $actief->save();
        return redirect("/");
    }

    function vorige(){
        $actief = Actief::first();
        if($actief <= 1){
            $actief = Upload::count();
        }else{
            $actief = $actief - 1;
        }
        $actief->save();
        return redirect("/");
    }


}

