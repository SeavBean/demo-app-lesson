<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    } 
    public function create(){
        return view('admin.category.create');
    }
    public function edit($id){
        $category = Category::FindOrFail($id);
        return view('admin.category.edit', ['category' => $category]);
    }  
    public function store(Request $request){
        // dd($request ->all());
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
        ]);
        $category = new Category();
        $category->name=$request->name; 
        $category->phone=$request->phone;
        $category->save();
        // commend to create database and save it
        return redirect()->route('admin.category.index');
    }     
    public function update(Request $request,$id){
        // dd($request ->all());
        $category = Category::FindOrFail($id);
        $category->name=$request->name;
        $category->phone=$request->phone;
        $category->save();
        // commend to create database and save it
        return redirect()->route('admin.category.index');   
    }
    public function delete($id){
        $category = Category::FindOrFail($id);
        $category->delete();
       return redirect()->route('admin.category.index');
    }   
}
