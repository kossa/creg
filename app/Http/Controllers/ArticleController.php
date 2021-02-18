<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create', 'store', 'edit', 'update', 'delete');
    }

    public function index()
    {
        $articles = Article::with('user')->paginate(100);

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
        ]);

        auth()->user()->articles()->create(request()->all() + ['image' => 'test']);

        return redirect()->route('articles.index')->withSuccess('Article created successfully');
    }
}
