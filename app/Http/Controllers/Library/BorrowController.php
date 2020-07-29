<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\BorrowRequest;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Borrow::get();
        return view('librarian.borrow.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarian.borrow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowRequest $request)
    {
        $is_borrowed = Borrow::where('book_id', $request->book_id)->first() != null;
        if ($is_borrowed) {
            return redirect()->route('borrow.create')->with('success', 'Book has been borrowed');
        }
        Borrow::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_at' => now(),
            'deadline' => now()->addDay(14)
        ]);
        return redirect()->route('borrow.index')->with('success', 'Can take the book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('librarian.borrow.show', compact('borrow'));
    }

    /**
     * Return book
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function return(Borrow $borrow)
    {
        $is_ontime = now() > $borrow->deadline;
        $borrow->update([
            'return_at' => now(),
            'is_ontime' => $is_ontime
        ]);
        return redirect()->route('borrow.index')->with('success', 'Book was returned');
    }
}
