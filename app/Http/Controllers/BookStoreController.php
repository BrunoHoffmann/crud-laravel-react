<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\BookStore;
use App\Http\Requests\BookStoreRequest;
use Illuminate\Support\Facades\Hash;

class BookStoreController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = BookStore::all();

        return view('app.book.index', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.book.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BookStoreRequest  $BookStoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {
        $book = BookStore::where('isbn', $request->isbn)->get();

        if(!empty($book[0]->isbn)) {
            return view('app.book.create', [
                'error' => 'ISBN already exists'
            ]);
        }

        $book = BookStore::create([
            "name" => $request->name,
            "isbn" => $request->isbn,
            "value" => $request->value
        ]);

        return redirect()->route('book.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = BookStore::find($id);

        return view('app.book.edit', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BookStoreRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookStoreRequest $request, $id)
    {
        $book = BookStore::where('isbn', $request->isbn)->where('id', '!=', $id)->get();
        if(!empty($book[0]->isbn)) {
            return view('app.book.edit', [
                'error' => 'ISBN already exists'
            ]);
        }

        $book = BookStore::find($id)->update([
            "name" => $request->name,
            "isbn" => $request->isbn,
            "value" => $request->value
        ]);

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = BookStore::where('id', $id)->delete();

        if(!empty($book[0]->id)) {
            return view('app.book.edit', [
                'error' => 'Id not found'
            ]);
        }

        return redirect()->route('book.index');
    }

}
