<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();

        return view('admin.tag.index', ['tags' => $tags]);
    } 
    public function create(){
        return view('admin.tag.create');
    }
    public function edit($id){
        $tag = Tag::FindOrFail($id);
        return view('admin.tag.edit', ['tag' => $tag]);
    }  
    public function store(Request $request){
        // dd($request ->all());
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
        ]);
        $tag = new Tag();
        $tag->name=$request->name;
        $tag->phone=$request->phone;
        $tag->save();
        // commend to create database and save it
        return redirect()->route('admin.tag.index');
    }     
    public function update(Request $request,$id){
        // dd($request ->all());
        $tag = Tag::FindOrFail($id);
        $tag->name=$request->name;
        $tag->phone=$request->phone;
        $tag->save();
        // commend to create database and save it
        return redirect()->route('admin.tag.index');
    }
    public function delete($id){
        $tag = Tag::FindOrFail($id);
        $tag->delete();
       return redirect()->route('admin.tag.index');
    }   
}
