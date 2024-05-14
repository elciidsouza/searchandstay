<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $fillable = [
        'name',
        'address',
        'active'
    ];

    public function books()
    {
        return $this->belongsToMany(Books::class, 'books_stores', 'store_id', 'book_id');
    }

    public function booksSelected()
    {
        return $this->hasMany(BooksStores::class, 'store_id', 'id');
    }
}
