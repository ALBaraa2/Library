@extends('layouts.app')

@section('content')
    <!-- Author Header -->
    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 p-8 text-white text-center shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold">{{ $author->name }}</h1>
        <p class="text-sm italic mt-2">{{ $author->bio ?? 'No biography available.' }}</p>
    </div>

    <!-- Contact Info -->
    <div class="p-6 mt-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Contact Information</h2>
        <div class="text-gray-600 leading-relaxed mb-4">
            <span class="font-medium">Email:</span> {{ $author->contact_info ?? 'Not provided' }}
        </div>
        <div class="text-gray-600 leading-relaxed mb-4">
            <span class="font-medium">Website:</span> 
            @if ($author->website)
                <a href="{{ $author->website }}" target="_blank" class="text-blue-500 underline">{{ $author->website }}</a>
            @else
                Not provided
            @endif
        </div>
    </div>

    <!-- Personal Details -->
    <div class="p-6 mt-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Personal Details</h2>
        <div class="text-gray-600 leading-relaxed mb-4">
            <span class="font-medium">Birth Date:</span> {{ $author->birth_date ?? 'Not provided' }}
        </div>
        <div class="text-gray-600 leading-relaxed mb-4">
            <span class="font-medium">Nationality:</span> {{ $author->nationality ?? 'Not provided' }}
        </div>
        <div class="text-gray-600 leading-relaxed mb-4">
            <span class="font-medium">Awards:</span> {{ $author->awards ?? 'No awards listed' }}
        </div>
    </div>

    <!-- Books -->
    <div class="p-6 mt-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Books by {{ $author->name }}</h2>
        @forelse ($books as $book)
            <div class="mb-6 border-b pb-4">
                <h3 class="text-lg font-semibold mb-2">
                    <a href="{{ route('books.show', $book->id) }}" class="text-indigo-600 hover:underline">
                        {{$loop->iteration}}. {{ $book->title }}
                    </a>
                </h3>
                <p class="text-gray-600 leading-relaxed">{{ $book->description }}</p>
                <div class="book-rating flex items-center mt-2">
                    @if ($book->reviews_avg_rating)
                        <span class="mr-2 text-sm font-medium text-slate-700">
                            {{ number_format($book->reviews_avg_rating, 1) }} / 5
                        </span>
                    @endif
                    <x-star-rating :rating="$book->reviews()->avg('rating') ?? 0" />
                    <span class="ml-2 text-sm text-gray-500">
                        {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                    </span>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No books found for this author.</p>
        @endforelse
    </div>
@endsection
