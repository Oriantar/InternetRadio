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

    function radioOutput(){
        $uploads = Upload::all();
        $actief = Actief::first();

        return view("RadioOutput.index")->with('actief', $actief)->with('uploads', $uploads);
    }

    function volgende(){
        
        $actief = Actief::first();
        if($actief->actief >= Upload::count()){
            
            $actief->actief = 1;
        }else{
            $actief->actief = $actief->actief + 1;
        }
        $actief->update();
        return redirect("/");
    }

    function vorige(){
        $actief = Actief::first();
        if($actief->actief <= 1){
            $actief->actief = Upload::count();
        }else{
            $actief->actief = $actief->actief - 1;
        }
        $actief->save();
        return redirect("/");
    }


}

