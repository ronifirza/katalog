<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:5',
            'photo_id' => 'required|exists:photos,id', 
        ]);

        Comment::create([
            'content'  => $request->input('content'),
            'photo_id' => $request->photo_id,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Komentar berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if (auth()->user()->role !== 'admin' && auth()->id() !== $comment->user_id) {
            return back()->with('error', 'Kamu tidak punya akses untuk menghapus komentar ini!');
        }

        $comment->delete();
        return back()->with('success', 'Komentar berhasil dihapus!');
    }
}
