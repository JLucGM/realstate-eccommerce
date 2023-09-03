<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Product;
use App\Models\TipoPropiedad;
use App\Models\SettingGeneral;

use Illuminate\Http\Request;

class BlogController extends Controller
{


    public function index()
    {

        $posts = Post::where('status', 2)->latest('id')->paginate(7);

          $productFooter = Product::with(['media'])->get()->take(3);
        $tipoPropiedad = TipoPropiedad::get()->take(7);

        $setting =  SettingGeneral::first();

        return view('frontend.indexBlog', compact('posts','productFooter','tipoPropiedad','setting'));
    }
    public function show(Post $post)
    {

          $productFooter = Product::with(['media'])->get()->take(3);
        $tipoPropiedad = TipoPropiedad::get()->take(7);

        $setting =  SettingGeneral::first();

        $categorias = Categorias::all();
        $similares = Post::where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();
        return view('frontend.showBlog', compact('post', 'similares', 'categorias','productFooter','tipoPropiedad','setting'));
    }


    public function category(Categorias $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(4);

        return view('web.blog.categories', compact('posts', 'category'));
    }



    public function tag(Tag $tag)
    {

        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(4);

        return view('web.blog.tags', compact('posts', 'tag'));
    }


    public function store(Request $request, Post $post)
    {

        // $request->validate(
        //     [
        //         'description' => 'required',
        //     ]
        // );
        // $comment = new Comment();
        // $comment->description = $request->description;
        // $comment->parent_id = $request->parent_id;
        // $comment->user_id = \auth()->id();
        // $post->comments()->save($comment);
        return redirect()->back();
    }
}
