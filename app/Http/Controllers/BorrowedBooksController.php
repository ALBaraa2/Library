<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBooks;
use Auth;
use Date;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class BorrowedBooksController extends Controller
{
    public function show(User $user)
    {
        $borrowedBooks = $user->borrowedBooks()->get();
        // dd($borrowedBooks->first());

        return view('borrowedBooks.show', compact('borrowedBooks'));
    }

    public function store(User $user, Book $book) {
        BorrowedBooks::created([
            'user_id' => Auth()->id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'due_date' => Date::parseFromLocale('+5 days'),
            'status' => 'borrowes'
        ]);

        return redirect()->route('borrowedBooks.show', $user)->with('success', 'You Borrowed this books successfuly, It will be returned after 5 days');
    }
}
