<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Democontroller extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function tag()
    {
        $tags = ['Laravel', 'PHP', 'JavaScript']; // Example data
        return view('tag' ,compact('tags'));
        // Assuming you have a view named 'tag'
        //use compact to pass data to the view
    }

    public function category()
    {
        $categories=[' myssql','php','laravel'];
        return view('category', compact('categories'));
    }

    public function blog()
    {
        return 'This is the blog page';
    }
}
