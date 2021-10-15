<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        $iduser = $request->user()->id;
        $posts = Post::where('user_id','=',$iduser)->paginate(8);
        return view('Post.list_post', compact('posts','iduser'));

    }



    public function filter_published(Request $request)
    {
        //
        $iduser = $request->user()->id;
        $posts = Post::where('user_id','=',$iduser)->where('published','=','0')->paginate(8);
        return view('Post.list_post', compact('posts','iduser'));

    }

    public function filter_unpublished(Request $request)
    {
        //
        $iduser = $request->user()->id;
        $posts = Post::where('user_id','=',$iduser)->where('published','=','1')->paginate(8);
        return view('Post.list_post', compact('posts','iduser'));
    }
    public function filter_publisher_Now(Request $request)
    {
        //
        $iduser = $request->user()->id;
        $posts = Post::where('user_id','=',$iduser)->whereDate("created_at",date('Y-m-d'))->paginate(8);
        return view('Post.list_post', compact('posts','iduser'));
    }

    public function filter_publisher_Old(Request $request)
    {
        //
        $iduser = $request->user()->id;
        $posts = Post::where('user_id','=',$iduser)->where("created_at",'<=',date('Y-m-d'))->paginate(8);
        return view('Post.list_post', compact('posts','iduser'));
    }

    public function filter_Now(Request $request)
    {
        //
        $posts = Post::whereDate("created_at",date('Y-m-d'))->paginate(8);
        return view('home', compact('posts'));
    }

    public function filter_Old(Request $request)
    {
        //
        $posts = Post::where("created_at",'<=',date('Y-m-d'))->paginate(8);
        return view('home', compact('posts'));
    }



    public function list_post_administrateur(Request $request)
    {
        if(Gate::allows('Admin')){
        $posts = Post::where('published','=','0')->paginate(8);
        return view('Post.list_post_administrateur', compact('posts'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('Publisher')){
            $category = Category::all();
            return view('Post.add_posts',compact('category'));
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Gate::allows('Publisher')){
            $random = Str::random(6);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $extension =$image->getClientOriginalExtension();
                $filename = $random.'-'.time().'.'.$extension;

                $post = new Post();
                $post->Title = $request->input('titre');
                $post->Slug = Str::slug($post->Title);

                $dupl = DB::select('select Slug from posts where Slug = ?', [$post->Slug]);

                if($dupl){
                    return redirect()->back()->with('info','Title is already exists');
                }
                
                $post->body = $request->input('body');
                $post->category_id = $request->input('category');
                $post->user_id = $request->user()->id;
                $post->published =$request->input('published');
                $post->image = $filename;
                
                $post->save();
                $image->move(public_path('images'),$filename);

                return redirect()->route('listpost')->with('success','Post created successfully!');  
               

                $details = [
                    'title' => 'now emails',         
                    'message' => 'new post have been created'
                ];
                Mail::to('yourmail@gmail.com')->send(new \App\Mail\postsnow($details));           
                dd("email is sent.");
            }
    }
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $category = Category::all();
        return view('Post.edit_post',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            $random = Str::random(6);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $extension =$image->getClientOriginalExtension();
                $filename = $random.'-'.time().'.'.$extension;

                $post = Post::findOrFail($request->input('id'));

                $namefile = $post->image;
                File::delete(public_path('images' .  $namefile));

                $post->Title = $request->input('titre');
                $post->Slug = Str::slug($post->Title);

                $dupl = DB::select('select Slug from posts where Slug = ?', [$post->Slug]);

                if($dupl){
                    return redirect()->back()->with('info','Title is already exists');
                }
                
                $post->body = $request->input('body');
                $post->category_id = $request->input('category');
                $post->user_id = $request->user()->id;
                $post->published =$request->input('published');
                $post->image = $filename;
                
                $post->update();
                $image->move(public_path('images'),$filename);

                return redirect()->route('ajouterpost')->with('success','Post updated successfully!');
            }else{
                return redirect()->back()->with('success','select image');
            } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        File::delete(public_path('images'.$post->image));
        $post->delete();
        return redirect()->route('listpost')->with('success','Post deleted successfully!');

    }
}
