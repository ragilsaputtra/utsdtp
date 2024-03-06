<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\book;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('author.index', [
            "authors" => author::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create',[
            // "books"=>book::get(),
            "authors" => author::get(),
            // "publishers" => publisher::get()
        ]);

        return redirect()->route('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }

       $author = new author();

       $author->name = $request->name;
    //    $author->create_at = $request->create_at;
    //    $author->update_at = $request->update_at;
       $author->photo =$photo;

       $author->save();

       return redirect()->route('author.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('author.show',[
            "authors"=>author::find($id),
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('author.edit',[
            "authors"=>author::find($id),
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $author = author::find($id);

        $photo = null;

        if ($request->hasFile('photo')) {
            // if (storage::exists($book->cover)){
            //     Storage::delete($book->cover);
            // }
            $photo = $request->file('photo')->store('photos');
        }
        $this->validate($request, [
            "name" => ["required"],
            "photo" => ['image']
            
        ]);


        // $book->update($ayam);
        $author->update([
            "name" =>  $request->name,
            "photo" => $photo
        ]);

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        author::find($id)->delete();
        return redirect()->route('author.index');
    }
}
