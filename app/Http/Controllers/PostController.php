<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = DB::table('posts')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        DB::table('posts')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => now()
        ]);
        return redirect('/')->with('success', 'post created successfully');
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        if (!$post) {
            abort('post not found'); // abort 404
        }
        return view('posts.create', compact('post'));
    }

    public function update(Request $request, $id)
    {
        DB::table('posts')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => now()
        ]);

        return redirect('/')->with('success', 'Post updated successfully');
    }


    public function delete($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
}
