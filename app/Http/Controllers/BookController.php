<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\book;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('book.index', [
            "books" => book::get(),
            "authors" => author::get(),
            "publishers" => publisher::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create',[
            // "books"=>book::get(),
            "authors" => author::get(),
            "publishers" => publisher::get()
        ]);

        return redirect()->route('book.create');
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

       $book = new book();

       $book->title = $request->title;
       $book->author_id = $request->author_id;
       $book->publisher_id = $request->publisher_id;
    //    $book->create_at = $request->create_at;
    //    $book->update_at = $request->update_at;
       $book->year = $request->year;
       $book->cover =$photo;
       $book->save();

       return redirect()->route('book.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('book.show',[
            "books"=>book::find($id),
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('book.edit',[
            "books"=>book::find($id),
            "authors"=>author::get(),
            "publishers"=>publisher::get()
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $book = book::find($id);

        $photo = null;

        if ($request->hasFile('photo')) {
            // if (storage::exists($book->cover)){
            //     Storage::delete($book->cover);
            // }
            $photo = $request->file('photo')->store('photos');
        }
        $this->validate($request, [
            "title" => ["required"],
            "year" => ["required"],
            "author_id" => ["required"],
            "publisher_id" => ["required"],
            "photo" => ['image']
            
        ]);


        // $book->update($ayam);
        $book->update([
            "title" =>  $request->title,
            "year" => $request->year,
            "author_id" => $request->author_id,
            "publisher_id" => $request->publisher_id,
            "cover" => $photo
        ]);

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        book::find($id)->delete();
        return redirect()->route('book.index');
    }

    public function search(Request $request){
        // Get the search values from the request
        $searchname = $request->input('searching');
        // Execute the query
        $books = book::where('title', 'LIKE', "%{$searchname}%")->get();
        // Return the search view with the results compacted
        return view('book.index', compact('books'));
    }
}
