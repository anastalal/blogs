<?php

namespace App\Http\Controllers;

use App\Models\officers;
use Illuminate\Http\Request;

class OfficersController extends Controller
{
    public function create()
    {
       return view('officers.create');
    }

    public function store(Request $request)
    {
        $office = officers::create([
            'name' => $request->name
            ]);
      

            $office->save();
      //  $input = Request->all();
        $id = $office->id;
       // $id = Reports::create($input)->id;
       
        return redirect('officers/show/'.$id);
    } 
    public function show($id)
    {
        
        $office = officers::find($id); 
        return view('officers.show', [
            'office' => $office,
            
        ]); //returns the view with the post 
       // return dd($report::find(3));
    }
}
