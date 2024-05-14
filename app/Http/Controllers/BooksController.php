<?php

namespace App\Http\Controllers;

use App\Models\Books;

class BooksController extends Controller
{
    public function index()
    {
        return view('books.index');
    }

    public function create()
    {
        return view('books.form');
    }

    public function edit($id)
    {
        return view('books.form', ['id' => $id]);
    }
}
