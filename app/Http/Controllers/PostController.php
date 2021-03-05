<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function getCategories(){
        return Category::latest()->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(3);
        $response = [
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem()
            ],
            'data' => $posts
        ];
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         =>  'required',
            'body'          =>  'required',
            'category_id'   =>  'required',
            'image'         => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $post = new Post;
        $post->user_id  = $request->user_id;
        $post->title    = $request->title;
        $post->slug     = Str::slug($request->title);
        $post->body     = $request->body;

        if($request->hasFile('image')){
            $image      = $request->file('image');
            $name       = Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $location   = public_path('/images');
            $image->move($location, $name);
            $post->image= $name;    
        }
            $post->category_id = $request->category_id; 
            $post->save();
            return $post;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return Post::with('category', 'user')
                    ->where('slug', $slug)
                    ->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Post::findOrFail($id);
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
        $request->validate([
            'title'         =>  'required',
            'body'          =>  'required',
            'category_id'   =>  'required',
            
        ]);
        $post = Post::find($id);
        $post->title    = $request->title;
        $post->slug     = Str::slug($request->title);
        $post->body     = $request->body;

        if($request->hasFile('image')){
            $image      = $request->file('image');
            $name       = Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $location   = public_path('/images');
            $image->move($location, $name);
            $oldImage   = $post->image;
            Storage::delete($oldImage);
            $post->image= $name;    
        }
            $post->category_id = $request->category_id; 
            $post->save();
            return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post   = Post::find($id);
        Storage::delete($post->image);
        $post->delete();

        return response()->json($post);
    }
    public function getHomepagePosts()
    {
        $posts = Post::orderBy('id','asc')->with('category')->latest()->paginate(3);
        $response = [
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem()
            ],
            'data' => $posts
        ];
        return response()->json($response);
    }
}
