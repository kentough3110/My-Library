<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';
    protected $primaryKey = 'id';
    protected $fillable = ['book_id', 'user_id', 'borrow_date','return_date','status'];

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
