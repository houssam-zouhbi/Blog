<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $artical=Artical::all();
      return view("home")->with("Artical",$artical);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){  
        if(Auth::check()){
            $artical=Artical::where('user_id',Auth::user()->id)->get();
            return view('mypost',['Artical'=>$artical]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $artical= Artical::create([
                'name' => $request->input('post-name'),
                'description' => $request->input('post-desc'),
                'user_id' => Auth::user()->id
            ]);
            if($artical){
                return redirect('/home');
            }
            
        }
       return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artical=Artical::where('id',$id)->get();
        $comment=comment::where('artical_id',$id)->get();
        
        return view("displayPost")->with("Artical",$artical)->with("Comment",$comment)->with("Id",$id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function edit(artical $artical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, artical $artical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artical = Artical::find($id);
        $artical->delete();
        return redirect("/myPosts");
       }
}
