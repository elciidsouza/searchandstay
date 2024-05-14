<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Books;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        return response()->json(Books::all());
    }

    public function find($id)
    {
        try{
            return response()->json(Books::find($id));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try{
            return response()->json(Books::create($request->all()));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function update(Request $request)
    {
        try{
            return response()->json(Books::find($request->id)->update($request->except('id')));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try{
            return response()->json(Books::find($id)->delete());
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
