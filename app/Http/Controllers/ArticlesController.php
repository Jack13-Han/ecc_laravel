<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles_list = Article::paginate(6);
        return view('articleList', compact('articles_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articleRegistration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $request->session()->regenerateToken();

        $request_data = new Article();

        $request_data->title = $request->title;
        $request_data->body = $request->body;

        if ($request->hasFile('img_path')) {
            $file_name = $request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->storeAs('public/images', $file_name);
            $request_data->img_path = 'storage/images/' . $file_name;
        }

        DB::transaction(function () use ($request_data) {
            $request_data->save();
        });

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article_data = Article::find($id);
        return view('articleDetail', compact('article_data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $article_data = Article::find($id);
            return view('articleEditing', compact('article_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $request->session()->regenerateToken();

        $request_data = Article::findOrFail($id);

        $request_data->title = $request->title;
        $request_data->body = $request->body;

        if ($request->hasFile('img_path')) {
            $file_name = $request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->storeAs('public/images', $file_name);
            $request_data->img_path = 'storage/images/' . $file_name;
        }

        DB::transaction(function () use ($request_data) {
            $request_data->save();
        });

        return redirect()->route('articles.show', $id)->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article_data = Article::findOrFail($id);
        $article_data->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
