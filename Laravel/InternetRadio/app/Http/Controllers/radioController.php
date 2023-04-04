<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Actief;

class radioController extends Controller
{
    function index(){
        $uploads = Upload::all();
        $actief = Actief::first();
        
        return view("index")->with('actief', $actief)->with('uploads', $uploads);
    }

    public function create(){

        return view('/upload/create');
    }

    public function store(Request $request){
        
        
        $upload = Upload::create([
            'radio_name' => $request->input('radio_name'),
            'radio_url' => $request->input('radio_url'),
        ]);
        
        return redirect('upload');
    }

    public function edit($id){
        $upload = Upload::find($id)->first();


        return view('/upload/edit')->with('upload', $upload);
    }

    public function mainIndex(){
        $uploads = Upload::all();

        
        return view('index', ['uploads' => $uploads]);
    }
}
