<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = ['red','yellow','blue','green','indigo','pink','purple',];

        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:35',
            'slug' => 'required|unique:tags',
            'color' => 'required',
        ]);

        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.index', compact('tag'))->with('info', 'La etiqueta se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors = ['red','yellow','blue','green','indigo','pink','purple',];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|min:3|max:35',
            'slug' => "required|unique:categories,slug,$tag->id",
            'color' => "required"
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actulizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index', $tag)->with('infoDelete', 'La etiqueta se eliminó correctamente');
    }
}
