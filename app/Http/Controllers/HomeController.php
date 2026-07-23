<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts=Post::when($request->category_id, function($query, $category_id){
            $query->where('category_id', $category_id);
        })
         ->when ($request->search, function($query, $search){
            $query->where('title', 'LIKE', '%' . $search . '%');
                
            
        })
        ->when ($request->tag_id, function($query, $tag_id){
            $query->whereHas('tags', function($sub_query) use ($tag_id){
                $sub_query->where('id', $tag_id);
            });
        })->paginate(10)
        ->withQueryString();



        // $posts = Post::paginate(10);
        
        // $posts= Post::all();

        // return view('index', compact('posts'));
        return view('index' ,['posts'=>$posts]);
    }
    public function article(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        // select posts
        return view('article' , ['post' => $post]);
    }
}
