@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-gradient-to-br from-blue-50 to-white shadow-lg rounded-lg p-8">
        <div class="flex items-center mb-8">
            <div class="w-20 h-20 rounded-full bg-blue-200 flex items-center justify-center shadow-md">
                <span class="text-2xl font-bold text-blue-600">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
            </div>
            <div class="ml-6">
                <h1 class="text-3xl font-extrabold text-gray-800">{{ $user->name }}</h1>
                <p class="text-gray-500 text-lg">Joined {{ $user->created_at->format('F d, Y') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- User Info Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-700 border-b pb-3 mb-4">User Information</h2>
                <p class="text-lg mb-4">
                    <span class="font-semibold text-gray-600">Email:</span> {{ $user->email }}
                </p>
                <p class="text-lg">
                    <span class="font-semibold text-gray-600">Account Created:</span> {{ $user->created_at->diffForHumans() }}
                </p>
            </div>

            <!-- Actions Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-700 border-b pb-3 mb-4">Actions</h2>
                <div class="space-y-4">
                    <a href="{{ route('users.edit', $user) }}"
                       class="block w-full px-4 py-2 text-center text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                        Edit Information
                    </a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="block w-full px-4 py-2 text-center text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                            Delete Account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
