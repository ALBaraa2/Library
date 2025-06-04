@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-gradient-to-br from-blue-50 to-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-extrabold text-gray-800 border-b-2 border-blue-500 pb-2 mb-6 text-center">
            Edit User Information
        </h1>
        
        <form method="POST" action="{{ route('user.update', $user) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-lg font-semibold text-gray-700 mb-2">Name</label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name', $user->name) }}" 
                       required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" 
                       name="email" 
                       id="email" 
                       value="{{ old('email', $user->email) }}" 
                       required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center mt-6">
                <button type="submit" 
                        class="btn">
                    Save Changes
                </button>
                <a href="{{ route('user.show', $user) }}"
                   class="btn-cancel">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
