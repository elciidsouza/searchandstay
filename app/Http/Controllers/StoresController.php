<?php

namespace App\Http\Controllers;

class StoresController extends Controller
{
    public function index()
    {
        return view('stores.index');
    }

    public function create()
    {
        return view('stores.form');
    }

    public function edit($id)
    {
        return view('stores.form', ['id' => $id]);
    }
}
