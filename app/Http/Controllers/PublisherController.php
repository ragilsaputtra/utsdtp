<?php

namespace App\Http\Controllers;

use App\Models\publisher;
use App\Models\book;
// use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publisher.index', [
            "publishers" => publisher::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.create',[
            // "books"=>book::get(),
            "publishers" => publisher::get(),
            // "publishers" => publisher::get()
        ]);

        return redirect()->route('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $publisher = new publisher();

       $publisher->name = $request->name;
       $publisher->address = $request->address;
    //    $publisher->create_at = $request->create_at;
    //    $publisher->update_at = $request->update_at;
    //    $publisher->photo =$photo;

       $publisher->save();

       return redirect()->route('publisher.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('publisher.show',[
            "publishers"=>publisher::find($id),
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('publisher.edit',[
            "publishers"=>publisher::find($id),
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $publisher = publisher::find($id);

        // $photo = null;

        // if ($request->hasFile('photo')) {
        //     // if (storage::exists($book->cover)){
        //     //     Storage::delete($book->cover);
        //     // }
        //     $photo = $request->file('photo')->store('photos');
        // }
        $this->validate($request, [
            "name" => ["required"],
            "alamat" => ['required']
            
        ]);


        // $book->update($ayam);
        $publisher->update([
            "name" =>  $request->name,
            "address" => $request->alamat
        ]);

        return redirect()->route('publisher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        publisher::find($id)->delete();
        return redirect()->route('publisher.index');
    }
}
