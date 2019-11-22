<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
// use Symfony\Component\HttpFoundation\Session\Session;
// use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPost = Post::all();

        return view('admin.posts.viewposts')->with('allPost', $allPost);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkCategories = Category::all();
        $checkTags = Tag::all();

        if($checkCategories->count() == 0){
            session::flash('info', 'Please create categories first');
            return redirect()->route('category.create');
        }elseif ($checkTags->count()==0) {
            session::flash('info', 'Please create yags first');
            return redirect()->route('tag.create');
        }
        return view('admin.posts.create')->
        with('catKey', $checkCategories)->
        with('tags', Tag::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'posttitle' => 'required|max:100',
            'featured' => 'required',
            'postcontent' => 'required',
            'categoryid' => 'required',
            'tags' => 'required'
        ]);
        
        $featured = $request->featured;
        $featuredNewName = time().$featured->getClientOriginalName();
        $featured->move('uploads/postImages', $featuredNewName);


        $postSave = Post::create(
            [
                'posttitle' => $request->posttitle,
                'postcontent' => $request->postcontent,
                'categoryid' => $request->categoryid,
                'featured' => 'uploads/postImages/'. $featuredNewName,
                'slug' => str_slug($request->posttitle)
            ]);

        // when creating many to many field
        $postSave->tags()->attach($request->tags);
        // dd($request->all());
        $postSave->save();

        session::flash('success', "Post Created Successfully");

        return redirect()->route('category.index');
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editPost = Post::find($id);
        return view('admin.posts.update')->
        with('editPost', $editPost)->
        with('catKey', Category::all())->
        with('tags', Tag::all());
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
        $this->validate($request, [
            'posttitle' => 'required|max:100',
            // 'featured' => 'required',
            'postcontent' => 'required',
            'categoryid' => 'required',
            'tags' => 'required'
        ]);
        $updates = Post::find($id);

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featuredNewName = time().$featured->getClientOriginalName();
            $featured->move('uploads/postImages', $featuredNewName);
            $updates->featured = 'uploads/postImages/'. $featuredNewName;
        }
            
        $updates->posttitle = $request->posttitle;
        // $updates->featured = $request->featured;
        $updates->postcontent = $request->postcontent;
        $updates->categoryid = $request->categoryid;

        // $updates->tags()->attach($request->tags);
        
        // when updating many to many field, though, the attach method will work, 
        // but will create another field in db, but the sync will delete and recreate 
        // the new edited values.
        $updates->tags()->sync($request->tags);

        $updates->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Post::find($id);
        $del->delete();
        return redirect()->route('post.index');
    }

    public function trashed()
    {
        /** 
         * fetching only trashed data in database 
         * (ie where deleted_at is NOT NULL)
         * and the OnlyTrashed() function is predefined function. :)
         */ 
           
         
        $trashPosts = Post::onlyTrashed()->get();
        // dd($trashPosts);
        
        return view('admin.posts.trashed')->with('trashPosts', $trashPosts);
    }

    public function kill($id){
        /**
         * This will permanently delete the trashed post
         * First, it will get all post with Tashed, then WHERE function will get ID
         * Then, forceDelete function is used to delete from database.
         */
        $killTrashed = Post::withTrashed()->where('id', $id)->first();
        // dd($killTrashed);

        $killTrashed->forceDelete();
        return redirect()->back();
    }

    public function restore($id){
        /**
         * This will work like kill function 
         * but restore with Restore function 
         * ie turning deleted_at field to null
         */

         $restorePost = Post::withTrashed()->where('id', $id)->first();

         $restorePost->restore();

         return redirect()->route('post.index');
    }
}
