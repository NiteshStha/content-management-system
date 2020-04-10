<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blogs.show')->with('post', $post);
    }
}
