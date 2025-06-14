@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-4xl font-bold text-gray-800 text-center mt-5 mb-5 border-b-2 border-blue-500 pb-2">Add a New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-semibold mb-2 text-lg">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Enter a title of the book..."
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="mb-6">
            <label for="author" class="block text-gray-700 font-semibold mb-2 text-lg">Author</label>
            <select id="author" name="author_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected>Select an Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
                <option value="new" style="background-color: #e0f7fa; color: #00796b; font-weight: bold;">
                    ➕ Add New Author
                </option>
            </select>
        </div>

        <div class="mb-6">
            <label for="publisher_id" class="block text-gray-700 font-semibold mb-2 text-lg">Publisher</label>
            <select id="publisher_id" name="publisher_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected>Select a Publisher</option>
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
                <option value="new" style="background-color: #e0f7fa; color: #00796b; font-weight: bold;">
                    ➕ Add New Publisher
                </option>
            </select>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const authorSelect = document.getElementById('author');
                const publisherSelect = document.getElementById('publisher_id');

                authorSelect.addEventListener('change', function () {
                    if (this.value === 'new') {
                        const confirmation = confirm("You will be redirected to the Author Creation page. Do you want to proceed?");
                        if (confirmation) {
                            window.location.href = "{{ route('authors.create') }}";
                        } else {
                            this.value = "";
                        }
                    }
                });

                publisherSelect.addEventListener('change', function () {
                    if (this.value === 'new') {
                        const confirmation = confirm("You will be redirected to the Publisher Creation page. Do you want to proceed?");
                        if (confirmation) {
                            window.location.href = "{{ route('publishers.create') }}";
                        } else {
                            this.value = "";
                        }
                    }
                });
            });
        </script>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 font-semibold mb-2 text-lg">Description</label>
            <textarea id="description" name="description" rows="3" value="{{ old('description') }}" placeholder="Enter a brief description..."
            class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div class="mb-6">
            <label for="genre" class="block text-gray-700 font-semibold mb-2 text-lg">Genre</label>
            <select id="genre" name="genre" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="" disabled selected>Select a Genre</option>
            <option value="Fiction">Fiction</option>
            <option value="Non-Fiction">Non-Fiction</option>
            <option value="Mystery">Mystery</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Science Fiction">Science Fiction</option>
            <option value="Romance">Romance</option>
            <option value="Biography">Biography</option>
            <option value="History">History</option>
            <option value="Poetry">Poetry</option>
            </select>
        </div>

        <div class="mb-6">
            <label for="quantity" class="block text-gray-700 font-semibold mb-2 text-lg">Quantity</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" required placeholder="Enter a quantity..."
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="mb-6">
            <label for="isbn" class="block text-gray-700 font-semibold mb-2 text-lg">ISBN</label>
            <input type="text" id="isbn" name="isbn" pattern="\d{10}|\d{13}" title="ISBN must be a 10 or 13-digit number" value="{{ old('isbn') }}" required placeholder="Enter ISBN..."
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="mb-6">
            <label for="publication_date" class="block text-gray-700 font-semibold mb-2 text-lg">Publish Date</label>
            <input type="date" id="publication_date" name="publication_date" required value="{{ old('publication_date') }}"
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="mb-6">
            <label for="language" class="block text-gray-700 font-semibold mb-2 text-lg">Language</label>
            <select id="language" name="language" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="">Select a language</option>
            <option value="en">English</option>
            <option value="ar">Arabic</option>
            <option value="fr">French</option>
            <option value="es">Spanish</option>
            <option value="de">German</option>
            <option value="zh">Chinese</option>
            <option value="hi">Hindi</option>
            <option value="ru">Russian</option>
            <option value="jp">Japanese</option>
            <option value="unknown">Other</option>
            </select>
        </div>

        <div class="mb-6">
            <label for="total_pages" class="block text-gray-700 font-semibold mb-2 text-lg">Number of Pages</label>
            <input type="number" id="total_pages" name="total_pages"  value="{{ old('total_pages') }}" required placeholder="Enter total pages..."
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="flex gap-2">
            <button type="submit" class="btn">Submit</button>
            <a href="{{ route('books.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection