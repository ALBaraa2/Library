@extends('layouts.app')

@section('content')

<div class="container mx-auto max-w-xl p-6 bg-white rounded-lg shadow-md mt-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Add New Author</h1>

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf

        <input type="hidden" name="redirect_to" value="{{ url()->previous() }}">
        <div class="mb-4">
            <label for="name" class="block font-semibold mb-2">Name <span class="text-red-500">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bio" class="block font-semibold mb-2">Biography</label>
            <textarea id="bio" name="bio" rows="4" placeholder="Write a brief bio..."
                class="w-full px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('bio') }}</textarea>
            @error('bio')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="contact_info" class="block font-semibold mb-2">Contact Info</label>
            <input type="text" id="contact_info" name="contact_info" value="{{ old('contact_info') }}"
                placeholder="Phone or other contact details"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('contact_info')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="birth_date" class="block font-semibold mb-2">Birth Date</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('birth_date')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nationality" class="block font-semibold mb-2">Nationality</label>
            <input type="text" id="nationality" name="nationality" value="{{ old('nationality') }}"
                placeholder="e.g. American, Egyptian..."
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('nationality')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="website" class="block font-semibold mb-2">Website</label>
            <input type="url" id="website" name="website" value="{{ old('website') }}"
                placeholder="https://example.com"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('website')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="awards" class="block font-semibold mb-2">Awards</label>
            <textarea id="awards" name="awards" rows="3" placeholder="List awards separated by commas..."
                class="w-full px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('awards') }}</textarea>
            @error('awards')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ url()->previous() }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn">Add Author</button>
        </div>
    </form>
</div>
@endsection
