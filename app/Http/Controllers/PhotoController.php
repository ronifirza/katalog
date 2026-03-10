<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya Admin yang dapat menambah produk.');
        }
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya Admin yang boleh tambah foto produk!');
        }

        $request->validate([
            'judul' => 'required|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required',
        ]);

        $path = $request->file('image_path')->store('photos', 'public');

        Photo::create([
            'judul' => $request->judul,
            'image_path' => $path,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('photos.index')->with('success', 'Foto berhasil diposting!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        $photo->load('comments.user');
        return view('photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya Admin yang dapat mengedit produk.');
        }
        return view('photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya Admin yang dapat memperbarui produk.');
        }

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            Storage::disk('public')->delete($photo->image_path);
            $path = $request->file('image_path')->store('photos', 'public');
            $photo->image_path = $path;
        }

        $photo->judul = $request->judul;
        $photo->deskripsi = $request->deskripsi;
        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Data diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya Admin yang dapat menghapus produk.');
        }

        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Foto dihapus!');
    }
}
