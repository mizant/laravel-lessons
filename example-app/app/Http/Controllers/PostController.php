<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class PostController extends Controller


{

    public function index() {
      $posts = Post::all();

      $post = Post::find(1);
      $tag = Tag::find(1);
      dd($tag->posts);


//      return view('post.index', compact('posts'));
    }

    public function main() {
        return view('about');
    }


public function create() {
    return view('post.create');
}

public function store() {
   $data = request()->validate([
       'title' => 'string',
       'content' => 'string',
       'image' => 'string',

   ]);
   Post::create($data);
   return redirect()->route('post.index');
}

public function show(Post $post) {
        return view('post.show', compact('post'));
}

public function edit(Post $post) {
return view('post.edit', compact('post'));
}

    public function update( Post $post) {

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',

        ]);

        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::withoutTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function destroy( Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate() {
        $post = Post::find(1);
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'image1.jpg',
            'likes' => '2000',
            'is_published' => 1,
        ];

       $post = Post::firstOrCreate([
            'title' => 'title some phpstorm'
        ],[
            'title' => 'title some phpstorm',
            'content' => 'some content',
            'image' => 'image1.jpg',
            'likes' => '2000',
            'is_published' => 1,
        ]);
        dump($post->content);
       dd('finished');
    }

    public function updateOrCreate(){
        $post = Post::updateOrCreate([
            'title' => 'its new title'
        ],[
            'title' => 'title update new',
            'content' => 'its new updated content',
            'image' => 'image1.jpg',
            'likes' => '2000',
            'is_published' => 1,
        ]);

        dump($post->content);
        dd('finished');
    }


}
