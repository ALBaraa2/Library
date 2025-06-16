@extends('layouts.app')

@section('title', 'Borrowed Books')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="page-title-create">My Borrowed Books</h1>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-md shadow-sm">
            <p class="text-green-700">{{ session('success') }}</p>
        </div>
    @endif

    @if($borrowedBooks->isEmpty())
        <div class="text-center mt-10">
            <p class="text-gray-500 text-lg">You haven't borrowed any books yet.</p>
            <a href="{{ route('books.index') }}" class="mt-4 inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                Browse Books
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($borrowedBooks as $borrowedBook)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('storage/books/'.$borrowedBook->book->cover_image) }}" alt="{{ $borrowedBook->book->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $borrowedBook->book->title }}</h2>
                        <p class="text-gray-600 mb-1">By: <span class="font-semibold">{{ $borrowedBook->book->author->name }}</span></p>
                        <p class="text-gray-600 mb-1">Borrowed On: <span class="font-semibold">{{ $borrowedBook->borrowed_at->format('M d, Y') }}</span></p>
                        <p class="text-gray-600 mb-1">Due Date: <span class="font-semibold">{{ $borrowedBook->due_date->format('M d, Y') }}</span></p>
                        <div class="mt-4">
                            <span class="px-3 py-1 text-sm rounded-full 
                                {{ $borrowedBook->status == 'borrowed' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($borrowedBook->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-4 text-center">
                        <a href="{{ route('books.show', $borrowedBook->book) }}" class="inline-flex items-center px-6 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 3a1 1 0 00-.894.553L6.382 8H3a1 1 0 000 2h3a1 1 0 01.894.553L9.618 15H7a1 1 0 100 2h6a1 1 0 100-2h-2.618l2.736-4.447A1 1 0 0117 10h3a1 1 0 000-2h-3a1 1 0 01-.894-.553L13.618 3H16a1 1 0 100-2H4a1 1 0 000 2h2.618L8.764 7.447A1 1 0 0111 8h3a1 1 0 100-2h-2.618l-2.736 4.447A1 1 0 017 10H4a1 1 0 000 2h3a1 1 0 01.894.553L9.618 17H7a1 1 0 000 2h6a1 1 0 000-2h-2.618l2.736-4.447A1 1 0 0113 10h3a1 1 0 100-2h-3a1 1 0 01-.894-.553L11.618 3H10z" />
                            </svg>
                            View Book Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
