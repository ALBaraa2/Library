@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-3xl font-bold text-gray-800 border-b-2 border-blue-500 pb-2 text-center">
        Add Review for {{ $book->title }}
    </h1>
    <form method="POST" action="{{ route('books.reviews.store', $book) }}" class="max-w-lg mx-auto">
        @csrf
        <div class="mb-6">
            <label for="comment" class="block text-lg font-semibold text-gray-700 mb-2">Review</label>
            <textarea 
                placeholder="Your review must be at least 15 characters" 
                name="comment" 
                id="comment" 
                required 
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            ></textarea>
        </div>
        
        <div class="mb-6">
            <label for="rating" class="block text-lg font-semibold text-gray-700 mb-2">Rating</label>
            <select 
                name="rating" 
                id="rating" 
                required 
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
                <option value="" disabled selected>Select a Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        
        <div class="flex space-x-2">
            <button type="submit" class="btn">Add Review</button>
            <a href="{{ route('books.show', $book) }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
@endsection
