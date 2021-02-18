<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role')->only('create', 'store', 'edit', 'update', 'delete');
    }

    public function index()
    {
        $articles = Article::with('user')->paginate(18);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'body' => 'required',
            'published_at' => 'required|after:now',
            'image' => 'required|image|mimes:jpg,bmp,png|max:' . 1024*4,
        ]);

        $path = request()->image->store('images');

        auth()->user()->articles()->create(['image' => $path] + request()->all());

        return redirect()->route('articles.index')->withSuccess('Article created successfully');
    }
}
