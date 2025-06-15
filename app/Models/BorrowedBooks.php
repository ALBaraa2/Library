<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class BorrowedBooks extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrowed_at',
        'due_date',
        'status',
    ];

    public function books() {
        
        return $this->hasMany(Book::class);
    }

    public function users() {

        return $this->belongsToMany(User::class);
    }
}
