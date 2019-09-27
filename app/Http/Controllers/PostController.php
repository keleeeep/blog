<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Session;
use Purifier;
use Image;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a variable and store all the blog posts in it form the database
        $admin = Auth::user();
        $posts = Post::All();
//        $admin = Auth::guard('admin');
//        dd($admin);
//        dd($admin->is_edit);

        // Return a view and pass it in the above variable
        return view('posts.index')->withPosts($posts)->withAdmin($admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();
        $tags = Tag::All();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $this->validate($request,array(
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body'  => 'required',
            'featured_image' => 'sometimes|image'
        ));

        // Store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category_id;

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,800)->save($location);

            $post->image = $filename;
        }

        $post->save();

        $post->tag()->sync($request->tags,false);

        Session::flash('success','The blog post was successfully save!');
        
        // Redirect to another page
        return redirect()->route('posts.show', $post->id);
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
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the post in database and save as a var
        $post = Post::find($id);
        $categories = Category::all();
        $tags=Tag::pluck('name','id')->all();
        $cats = [];
        foreach ($categories as $category){
            $cats[$category->id]=$category->name;
        }

        // Return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withTag($tags)->withCategories($cats);
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
        // Validate the data
            $this->validate($request,array(
                'title' => 'required|max:255',
                'slug'  => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body'  => 'required',
                'featured_image' =>'image'
            ));


        // Save the data to the database
        $post = Post::find($id);

        // can use this
        // $post->title = $request->input('title');
        // $post->title = $request->input('body');

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        if ($request->hasFile('featured_image')){
            //Add the image
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,800)->save($location);
            $oldFilename = $post->image;
            //Update the database
            $post->image = $filename;
            //Delete the image
            Storage::delete($oldFilename);
        }

        $post->save();

        $post->tag()->sync($request->tags,true);

        // Set flash data with success message
        Session::flash('success','This post was successfully saved! ');
        
        // Redirect with flash data to posts.show
        return redirect()->route('posts.show',$post->id);

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
        $post->tag()->detach();
        $oldFilename = $post->image;
        Storage::delete($oldFilename);
        $post->delete();
        Session::flash('success','The post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
