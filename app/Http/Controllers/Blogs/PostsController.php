<?php

namespace App\Http\Controllers\Blogs;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blogs.show')->with('post', $post);
    }

    public function category(Category $category)
    {
        return view('blogs.category')
            ->with('category', $category)
            ->with('posts', $category->posts()->searched()->simplePaginate(4))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {
        return view('blogs.tag')
            ->with('tag', $tag)
            ->with('posts', $tag->posts()->searched()->simplePaginate(4))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }
}
