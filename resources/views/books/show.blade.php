@extends('layouts.app')

@section('content')

@include('alerts.alert')

    <div class="mb-4">
        <h1 class="sticky top-0 mb-2 text-2xl">{{ $book->title }}</h1>

        <div class="book-info">
        <a href="{{ route('authors.show', $book) }}" class="book-author mb-4 text-lg font-semibold">by {{ $book->author->name }}</a>
        <div class="text-gray-600 leading-relaxed mb-6">{{ $book->description }}</div>
        <div class="book-rating flex items-center">
            <div class="mr-2 text-sm font-medium text-slate-700">
                @if ($rating != null)
                    {{ number_format($rating, 1) }}
                @endif
            <x-star-rating :rating="$rating ?? 0"/>
            </div>
            <span class="book-review-count text-sm text-gray-500">
            {{ $reviewsCount }} {{ Str::plural('review', $reviewsCount) }}
            </span>
        </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="mb-10">
        <a href="{{ route('books.index') }}" class="link">🔙 Go back to the task list!</a>
    </div>

    <div class="mb-4 flex space-x-6">
        <a href="{{ route('books.reviews.create', $book) }}" class="reset-link">Add a review</a>
        <a href="{{ route('books.edit', $book) }}" class="reset-link">Edit</a>
    </div>
    <form action="{{ route('books.destroy', $book) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-cancel">Delete this book!</button>
    </form>

    <div class="mb-10">

    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-bold text-gray-800 border-b-2 border-blue-500 pb-2">Reviews</h2>
        <ul class="space-y-6">
            @forelse ($book->reviews as $review)
                <li class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <div class="mb-3">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <span class="text-lg font-semibold text-gray-600">
                                    {{ $review->user->name ?? 'Anonymous' }}
                                </span>
                                <span class="text-gray-500 text-sm">
                                    • {{ $review->created_at->format('M j, Y') }}
                                </span>
                            </div>
                            <div class="book-rating">
                                <x-star-rating :rating="$review->rating" />
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed">{{ $review->comment }}</p>
                    </div>
                    <form action="{{ route('books.reviews.destroy', [$book, $review]) }}" method="POST" class="text-right">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 text-sm font-semibold text-red-600 bg-red-100 border border-red-200 rounded-lg shadow-sm transition duration-200 hover:bg-red-200 hover:border-red-300 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1">
                            Delete Review
                        </button>
                    </form>

                </li>
            @empty
                <li class="p-4 bg-gray-50 rounded-lg shadow-sm text-center">
                    <p class="text-gray-600 text-lg">No reviews yet. Be the first to add a review!</p>
                </li>
            @endforelse
        </ul>
    </div>


@endsection
