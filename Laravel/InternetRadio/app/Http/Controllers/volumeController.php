<?php

namespace App\Http\Controllers;

use App\Models\Volume;
use Illuminate\Http\Request;

class volumeController extends Controller
{

    function volumeOutput(){
        $volume = Volume::first();

        return view("VolumeOutput.index")->with('volume', $volume);
    }

    function volgende(){
        
        $volume = volume::first();
        if($volume->volume >= 15){
            
            return redirect("/");
        }else{
            $volume->volume = $volume->volume + 1;
        }
        $volume->update();
        return redirect("/");
    }

    function vorige(){
        $volume = Volume::first();
        if($volume->volume <= 0){
            return redirect("/");
        }else{
            $volume->volume = $volume->volume - 1;
        }
        $volume->save();
        return redirect("/");
    }
}
