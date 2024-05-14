<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stores;
use Exception;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index()
    {
        return response()->json(Stores::with(['books'])->get());
    }

    public function find($id)
    {
        try{
            return response()->json(Stores::with(['booksSelected'])->find($id));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

    }

    public function store(Request $request)
    {
        try{
            $stores = Stores::create($request->all());
            return response()->json($stores->books()->sync($request->booksSelected));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function update(Request $request)
    {
        try{
            Stores::find($request->id)->books()->sync($request->booksSelected);
            return response()->json(Stores::find($request->id)->update($request->except('id')));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try{
            return response()->json(Stores::find($id)->delete());
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
