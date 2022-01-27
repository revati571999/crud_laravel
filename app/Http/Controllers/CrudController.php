<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.dashboard.AddPost');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>'required',
            'description'=>'required|max:500'
        ],[
            'name.required'=>'Name is Required',
            'description.required'=>' Description is Required'
        ]);
        if($validateData)
        {
            $name=$request->name;
            $description=$request->description;

            $AddPost=new Post();
            $AddPost->name=$name;
            $AddPost->description=$description;

            if($AddPost->save())
            {
                return back()->with('success','Post Added Successfully!!');
            }
            else {
                
                return back()->with('errMsg','Post  not Added Successfully');
            }

        }
        else {
            
            return back()->with('errMsg','Uploading Error');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $AllPost=Post::all();
        return view('crud.dashboard.PostList',['AllPost'=>$AllPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EditPost=Post::where('id',$id)->first();
        return view('crud.dashboard.EditPost',compact('EditPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required',
            'description'=>'required|max:500'
        ],[
            'name.required' => "Asset type is required !",
            'description.max' => "Asset description must be maximum 500 characters. "
        ]);
        if($validateData){
            $name = $request->name;
            $description = $request->description;
            Post::where('id',$request->id)->update([
                'name'=>$name,
                'description'=>$description
            ]);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Post::where('id',$request->aid)->delete();
        return back();
        
    }
}
