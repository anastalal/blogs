<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Reports;
use App\Models\officers;
use Illuminate\Http\Request; 
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function index(Request $request)
    {     
        if (Auth::check()){
        if (Auth::user()->isAdministrator()){  
            $stat = $request->stat;
           
        if( $stat == 'اجل' ){ 
            //$stat = 'اجل'; 
            $reports= Reports::
            whereDate('created_at' , $request->date )
                ->where('stat' ,$stat)
            ->get();
        } 
        else if ($stat == "نقد"){
        $stat = "نقد"; 
        $reports= Reports::
        whereDate('created_at' , $request->date )
            ->where('stat' ,$stat)
        ->get();
    } 
     else 
     {
       
        $reports= Reports::
        whereDate('created_at' , $request->date )->get();
     }
        
            
        } 
        else {
        $id = Auth::id(); 
        $reports = Reports::where('user_id', $id)->get();
        } 
    }  else{
        $reports = Reports::all(); 
    }
        $officers = officers::all();
        $users = User::all();
        $stat = $request->stat;
        return view('reports.index', [
                'reports' => $reports,
                'officers' => $officers,
                'users'  =>$users ,
                'stat' =>$stat
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

    public function update($id ,Request $request)
    { 
        $affectedRecords = Reports::where("id", $id)->update(["active" => 0]);
       
        return redirect('/reports/show/'.$id)->with('success','Post updated successfully!');
    }
    public function archive($id ,Request $request)
    { 
        $affectedRecords = Reports::where("id", $id)->update(["active" => 0]);
       
        return redirect('/reports/show/'.$id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/home')->with('success','Post deleted successfully!');
    }
}
