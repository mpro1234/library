<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function addCategory(Request $request, Book $book)
{
    $book->categories()->attach($request->category_id);
    return $book->load('categories');
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return Book::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // return $book ;
    // }

    public function show(Book $book)
    {
        //
    return $book ;
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }
    public function update(Request $request, Book $book)

    {
        //
        $book->update($request->all());
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return response()->noContent();
    }
}
