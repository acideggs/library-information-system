<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::get();
        return view('librarian.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarian.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        for ($i=1; $i <= $request->total; $i++) { 
            Book::create($request->all());
        }
        return redirect()->route('book.index')->with('success', 'New Book was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('librarian.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('librarian.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        if($request->update_option === "this"){
            $book->update($request->all());
        } else {
            $books = Book::where('title', $request->old_title)->get();
            foreach ($books as $bookItem) {
                $bookItem->update($request->all());
            }
        }
        return redirect()->route('book.index')->with('success', 'Book was updated');
    }

    /**
     * Show the confirmation for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Book $book)
    {
        return view('librarian.book.delete', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Book $book)
    {
        if ($request->delete_option === "this") {
            $book->delete();
        } else {
            $books = Book::where('title', $book->title)->get();
            foreach ($books as $bookItem) {
                $bookItem->delete();
            }
        }
        return redirect()->route('book.index')->with('success', 'Book was deleted');
    }
}
