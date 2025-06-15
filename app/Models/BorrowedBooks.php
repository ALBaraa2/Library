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

    protected $casts = [
        'borrowed_at' => 'date',
        'due_date' => 'date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
