<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class radioController extends Controller
{
    public function index()
    {
        $uploads = Upload::all();

        
        return view('upload.index', ['uploads' => $uploads]);
          
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
        $upload = Upload::find($id);
        return view('upload.edit', ['upload' => $upload]);
    }

    public function mainIndex(){
        $uploads = Upload::all();

        
        return view('index', ['uploads' => $uploads]);
    }
}
