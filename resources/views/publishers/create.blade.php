@extends('layouts.app')

@section('content')

<div class="container mx-auto max-w-xl p-6 bg-white rounded-lg shadow-md mt-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Add New Publisher</h1>

    <form action="{{ route('publishers.store') }}" method="POST">
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
            <label for="address" class="block font-semibold mb-2">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}"
                placeholder="Publisher's address"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('address')
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

        <div class="flex justify-between">
            <a href="{{ url()->previous() }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn">Add Publisher</button>
        </div>
    </form>
</div>
@endsection
