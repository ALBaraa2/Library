@extends('layouts.app')

@section('content')

    <a href="{{ route('books.index') }}" 
        class="inline-flex items-center gap-1 text-gray-600 font-semibold hover:text-blue-800 transition-colors duration-300 underline decoration-blue-400 hover:decoration-blue-600 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Go back to the task list!
    </a>
    <div class="mb-8 bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h1 class="text-5xl font-extrabold text-gray-900 text-center leading-tight tracking-wide mb-6">
            <span class="block bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-transparent bg-clip-text">
                {{ $book->title }}
            </span>
        </h1>

        <div class="text-center space-y-4">
            <a href="{{ route('authors.show', $book->author) }}" 
            class="text-xl font-medium text-blue-600 hover:text-blue-800 underline decoration-dotted">
                by {{ $book->author->name }}
            </a>

            <p class="text-gray-600 text-lg leading-relaxed">
                {{ $book->description }}
            </p>

            <div class="flex justify-center items-center space-x-4">
                <div class="flex items-center text-2xl font-semibold text-gray-800">
                    @if ($rating != null)
                        {{ number_format($rating, 1) }}
                    @endif
                    <x-star-rating :rating="$rating ?? 0" />
                </div>

                <span class="text-lg text-gray-500">
                    {{ $reviewsCount }} {{ Str::plural('review', $reviewsCount) }}
                </span>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="mb-10 flex flex-wrap items-center gap-6">
        <a href="{{ route('books.reviews.create', $book) }}" 
            class="px-4 py-2 bg-blue-300 text-blue-900 rounded-md shadow hover:bg-blue-400 transition">
            Add a review
        </a>

        <form action="{{ route('borrowedBooks.store', [Auth()->user(), $book]) }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit">Borrow this book</button>
        </form>

        @can('update', $book)
            <a href="{{ route('books.edit', $book) }}" 
                class="px-4 py-2 bg-gray-300 text-gray-900 rounded-md shadow hover:bg-gray-400 transition">
                Edit
            </a>
        @endcan
    </div>
    @can('delete', $book)
        <form action="{{ route('books.destroy', $book) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-cancel">Delete this book!</button>
        </form>
    @endcan

    <div class="mb-10">

    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-bold text-gray-800 border-b-2 border-blue-500 pb-2">
            Reviews
            <span class="ml-4 inline-block bg-blue-100 text-blue-700 text-sm font-semibold px-3 py-1 rounded-full shadow-sm">
                {{ $book->reviews->count() }} {{ Str::plural('Review', $book->reviews->count()) }}
            </span>
        </h2>
        <ul class="space-y-6">
            @forelse ($book->reviews as $review)
                <li class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <div class="mb-3">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <span class="text-lg font-semibold text-gray-600">
                                    @if ($review->anonymous)
                                        Anonymous
                                    @else
                                        {{ $review->user->name ?? 'Anonymous' }}
                                    @endif
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
                    @can('delete', $review)
                        <form action="{{ route('books.reviews.destroy', [$book, $review]) }}" method="POST" class="text-right">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 text-sm font-semibold text-red-600 bg-red-100 border border-red-200 rounded-lg shadow-sm transition duration-200 hover:bg-red-200 hover:border-red-300 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1">
                                Delete Review
                            </button>
                        </form>
                    @endcan

                </li>
            @empty
                <li class="p-4 bg-gray-50 rounded-lg shadow-sm text-center">
                    <p class="text-gray-600 text-lg">No reviews yet. Be the first to add a review!</p>
                </li>
            @endforelse
        </ul>
    </div>


@endsection
