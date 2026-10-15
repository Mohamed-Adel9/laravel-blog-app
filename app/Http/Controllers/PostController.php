<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\title;

class PostController extends Controller
{
    public function index()
    {

        // select * from post 
        $postsFromDB = Post::all();

        return view('posts.index', data: ['posts' => $postsFromDB]);
    }

    public function show(Post $post)
    {
        //select * from posts where id = $postId
        //1- find  retrn model
        // $singlePostFromDB = Post::findOrFail($postId);

        // if(is_null($singlePostFromDB)){
        //     return to_route('posts.index');
        // }

        //2- where with first
        // $singlePostFromDB = Post::where('id',$postId)->first();  //return model

        // 3- where with get
        // $singlePostFromDB = Post::where('id',$postId)->get(); 

        //retrun object collection

        // @dd($singlePostFromDB);



        return view('posts.show', data: ['post' => $post]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        //1 - get the data from the form 
        // $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->posted_by;

        // @dd($title , $description, $postCreator);

        //2 save in database

        //1st solve
        // $post = new Post();

        // $post->title = $title;
        // $post->description = $description;

        // $post->save();

        //2nd solve
        // we need to make the title and desc fillable in the model
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);
        //3 redirect to index
        return to_route(route: 'posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    public function update($postId)
    {
        //1 - get the data from the form 
        $title = request()->title;
        $description = request()->description;
        $createdBy = request()->posted_by;

        // @dd($title , $description , $createdBy) ;
        // return $data;
        //2 save in database

        // $post = Post::find(1);

        // $post->title = $title;
        // $post->description = $description;


        // $post->save();

        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $createdBy,

        ]);

        //3 redirect to show
        return to_route('posts.show', $postId);
    }

    public function destroy($postId)
    {
        // 1- delete from the database

        //select the post
        $singlePostFromDB = Post::find($postId);
        //delete the post
        $singlePostFromDB->delete();

        //2- return the index 
        return to_route('posts.index');
    }
}
