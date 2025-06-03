@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-900">Create Your Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('name')
                    <div class="mt-2 text-red-600 text-sm font-medium flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.054 0 1.908-.816 1.995-1.85L21 16.22V7.78c0-1.054-.816-1.908-1.85-1.995L18.22 5H5.78C4.726 5 3.872 5.816 3.784 6.85L3 7.78v8.44c0 1.054.816 1.908 1.85 1.995L5.78 19z" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('email')
                    <div class="mt-2 text-red-600 text-sm font-medium flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.054 0 1.908-.816 1.995-1.85L21 16.22V7.78c0-1.054-.816-1.908-1.85-1.995L18.22 5H5.78C4.726 5 3.872 5.816 3.784 6.85L3 7.78v8.44c0 1.054.816 1.908 1.85 1.995L5.78 19z" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('password')
                    <div class="mt-2 text-red-600 text-sm font-medium flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.054 0 1.908-.816 1.995-1.85L21 16.22V7.78c0-1.054-.816-1.908-1.85-1.995L18.22 5H5.78C4.726 5 3.872 5.816 3.784 6.85L3 7.78v8.44c0 1.054.816 1.908 1.85 1.995L5.78 19z" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <button type="submit" 
                class="w-full py-3 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 transition">
                Register
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
