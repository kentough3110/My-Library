<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'author', 'publisher','year_publication','isbn'];

    public function borrows()
    {
        return $this->hasMany(Borrow::class, 'book_id', 'id');
    }
}
