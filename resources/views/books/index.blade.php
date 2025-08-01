@extends('layouts.app')

@section('content')

    <h1 class="page-title">Books</h1>

    <form action="{{ route('books.index') }}" method="GET" class="mb-4 flex items-center space-x-1">
        <input type="text" name="title" placeholder="Search by title"
        value="{{ request('title') }}" class="input h-10"/>
        <input type="hidden" name="filter" value="{{ request('filter') }}"/>
        <select 
            name="genre" 
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >
            <option value="" {{ request('genre') == '' ? 'selected' : '' }}>All Genres</option>
            <option value="Fiction" {{ request('genre') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
            <option value="Non-Fiction" {{ request('genre') == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
            <option value="Mystery" {{ request('genre') == 'Mystery' ? 'selected' : '' }}>Mystery</option>
            <option value="Fantasy" {{ request('genre') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
            <option value="Science Fiction" {{ request('genre') == 'Science Fiction' ? 'selected' : '' }}>Science Fiction</option>
            <option value="Romance" {{ request('genre') == 'Romance' ? 'selected' : '' }}>Romance</option>
            <option value="Biography" {{ request('genre') == 'Biography' ? 'selected' : '' }}>Biography</option>
            <option value="History" {{ request('genre') == 'History' ? 'selected' : '' }}>History</option>
            <option value="Poetry" {{ request('genre') == 'Poetry' ? 'selected' : '' }}>Poetry</option>
        </select>
        <button type="submit" class="btn h-10">Search</button>
        <a href="{{ route('books.index') }}" class="btn h-10 color">Clear</a>
        @can('create_book', Auth()->user())
          <a href="{{ route('books.create') }}" class="btn h-10 color" title="Add Book">Add</a>
        @endcan
    </form>

    <div class="filter-container mb-4 flex">
        @php
            $filters = [
                '' => 'Latest',
                'popular_last_month' => 'Popular Last Month',
                'popular_last_6months' => 'Popular Last 6 Months',
                'highest_rated_last_month' => 'Highest Rated Last Month',
                'highest_rated_last_6months' => 'Highest Rated Last 6 Month',
            ];
        @endphp

        @foreach ($filters as $key => $label)
            <a href="{{ route('books.index', [...request()->query(), 'filter' => $key]) }}"
            class="{{ request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item' }}">
            {{ $label }}
            </a>
        @endforeach
    </div>

    <ul>
        @forelse ($books as $book)
          <li class="mb-4">
            <div class="book-item">
              <div
                class="flex flex-wrap items-center justify-between">
                <div class="w-full flex-grow sm:w-auto">
                  <a href="{{ route('books.show', $book) }}" class="book-title">{{ $book->title }}</a>
                  <span class="book-author">by {{ $book->author->name }}</span>
                </div>
                <div>
                  <div class="book-rating">
                    <x-star-rating :rating="$book->reviews_avg_rating ?? 0" />
                  </div>
                  <div class="book-review-count">
                    out of {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                  </div>
                </div>
              </div>
            </div>
          </li>
        @empty
          <li class="mb-4">
            <div class="empty-book-item">
              <p class="empty-text">No books found</p>
              <a href="{{ route('books.index') }}" class="reset-link">Reset criteria</a>
            </div>
          </li>
        @endforelse
    </ul>
    @if ($books->count())
        <nav class="mt-4 pagination">
            {{ $books->links() }}
        </nav>
    @endif
@endSection
