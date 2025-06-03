@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-4xl font-bold text-gray-800 text-center mt-5 mb-5 border-b-2 border-blue-500 pb-2">Edit Details for "{{ $book->title }}"</h1>
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-semibold mb-2 text-lg">Title</label>
            <input type="text" id="title" name="title" 
                value="{{ old('title', $book->title) }}" required 
                placeholder="Enter a title of the book..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="mb-6">
            <label for="author" class="block text-gray-700 font-semibold mb-2 text-lg">Author</label>
            <select id="author" name="author_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled>Select an Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" 
                            {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="publisher_id" class="block text-gray-700 font-semibold mb-2 text-lg">Publisher</label>
            <select id="publisher_id" name="publisher_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected>Select a Publisher</option>
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}" 
                            {{ old('author_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}>
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 font-semibold mb-2 text-lg">Description</label>
            <textarea id="description" name="description" rows="3" 
                    placeholder="Enter a brief description..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="genre" class="block text-gray-700 font-semibold mb-2 text-lg">Genre</label>
            <select id="genre" name="genre" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled>Select a Genre</option>
                @foreach (['Fiction', 'Non-Fiction', 'Mystery', 'Fantasy', 'Science Fiction', 'Romance', 'Biography', 'History', 'Poetry'] as $genre)
                    <option value="{{ $genre }}" 
                            {{ old('genre', $book->genre) == $genre ? 'selected' : '' }}>
                        {{ $genre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="quantity" class="block text-gray-700 font-semibold mb-2 text-lg">Quantity</label>
            <input type="number" id="quantity" name="quantity" 
                value="{{ old('quantity', $book->quantity) }}" required 
                placeholder="Enter a quantity..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="flex gap-2">
            <button type="submit" class="btn">Update</button>
            <a href="{{ route('books.show', $book) }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
