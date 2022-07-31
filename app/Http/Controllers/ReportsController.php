<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Reports;
use App\Models\officers;
use Illuminate\Http\Request; 

class ReportsController extends Controller
{
    public function index()
    { 
        $id = Auth::id(); 
        $reports = Reports::where('user_id', $id)->get();

        //$reports = Reports::where('user_id', $id)->find();
        //return dd($reports);
        return view('reports.index', [
                'reports' => $reports,
            ]);
    }

    public function create()
    { 
        $officers = officers::get();
       return view('reports.create',[
        'officers' => $officers,
       ]);
    }

    public function store(Request $request)
    { 
        if( $request->has('later') ){
            $stat = "اجل";
        } 
        else 
        $stat = "نقد";
        $report = Reports::create([
            'user_id' => Auth::id(),
            'office_id' => $request->office_id,
            'name' => $request->name,
            'price' => $request->price,
            'phone' =>  $request->phone,
            'stat' => $request->stat,
            'active' =>  $request->active
            ]);
      

            $report->save();
      //  $input = Request->all();
        $id = $report->id;
       // $id = Reports::create($input)->id;
       
        return redirect('reports/show/'.$id);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Reports::find($id); 
        $user = User::find($report->user_id);
        $office = officers::find($report->office_id); 
        return view('reports.show', [
            'report' => $report,
            'user'   => $user, 
            'office' => $office,
        ]); //returns the view with the post 
       // return dd($report::find(3));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            ]);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->published_at = $request->published_at;

        $post->save();
        return redirect('/home')->with('success','Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/home')->with('success','Post deleted successfully!');
    }
}
