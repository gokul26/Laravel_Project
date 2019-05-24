<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;

class PostController extends Controller
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = Post::all();
        $posts = Post::orderBy('created_at','desc')->paginate(2);
        return view('posts.postindex')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.postcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'title'=>'required', 
            'body'=>'required',
            'cover_image'=>'required|nullable|max:1999' //Filesize is give less than 2Mb, Since maximum upload size in apache server is 2Mb only
        ]);

        // Handling File upload
        if ($request->hasFile('cover_image')) 
        {
            // Get File with Extension
            $filewithExt = $request->file('cover_image')->getClientOriginalName();

            // Get File Name
            $fileName = pathinfo($filewithExt, PATHINFO_FILENAME);

            // Get File Extenstion
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();

            // New FIle Name
            $filenameToStore = $fileName.'_'.time().'.'.$fileExt;

            // Actual Uploading
            $path = $request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);
        } 
        else 
        {
            $filenameToStore = 'noimage.jpg';
        }
        

        // Creating Posts
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $filenameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.postshow')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check the User
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.postedit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, 
        [
            'title'=>'required', 
            'body'=>'required',
        ]);
        
        
        // Handling File upload
        if ($request->hasFile('cover_image')) 
        {
            // Get File with Extension
            $filewithExt = $request->file('cover_image')->getClientOriginalName();

            // Get File Name
            $fileName = pathinfo($filewithExt, PATHINFO_FILENAME);

            // Get File Extenstion
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();

            // New FIle Name
            $filenameToStore = $fileName.'_'.time().'.'.$fileExt;

            // Actual Uploading
            $path = $request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);
        } 
        
        // Update Posts
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image'))
        {
         $post->cover_image = $filenameToStore;   
        }
        $post->save();
        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
