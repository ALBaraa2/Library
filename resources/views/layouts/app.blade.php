<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Book Reviews</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style type="text/tailwindcss">
    .btn {
      @apply bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 h-10;
      @apply transition duration-300;
    }

    .btn:hover {
      @apply ring-green-500 text-green-500 bg-green-50;
    }

    .btn-cancel {
      @apply bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 h-10;
      @apply hover:bg-red-50 hover:text-red-500 hover:ring-red-500 transition duration-300;
    }

    .link {
        @apply font-medium text-gray-700 underline decoration-blue-500
    }

    .input {
      @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-md border-slate-300;
    }

    .filter-container {
      @apply mb-4 flex space-x-2 rounded-md bg-slate-100 p-2;
    }

    .filter-item {
      @apply flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium text-slate-500;
    }

    .filter-item-active {
      @apply bg-white shadow-sm text-slate-800 flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium;
    }

    .book-item {
      @apply text-sm rounded-md bg-white p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10;
    }

    .book-title {
      @apply text-lg font-semibold text-slate-800 hover:text-slate-600;
    }

    .book-author {
      @apply block text-slate-600;
    }

    .book-rating {
      @apply text-sm font-medium text-slate-700;
    }

    .book-review-count {
      @apply text-xs text-slate-500;
    }

    .empty-book-item {
      @apply text-sm rounded-md bg-white py-10 px-4 text-center leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10;
    }

    .empty-text {
      @apply font-medium text-slate-500;
    }

    .reset-link {
      @apply text-slate-500 underline;
    }

    .pagination a {
        @apply text-blue-600 bg-white hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out py-2 px-4 no-underline rounded-lg border border-gray-200 shadow-sm hover:shadow-md;
    }

    /* Active Pagination Link */
    .pagination a.active {
        @apply bg-blue-500 text-white border-blue-500;
    }

    /* Disabled Pagination Link */
    .pagination a.disabled {
        @apply text-gray-400 bg-gray-100 cursor-not-allowed hover:bg-gray-100 hover:text-gray-400;
    }

    .page-title-create {
        @apply text-4xl font-bold text-gray-800 text-center mt-5 mb-5 border-b-2 border-blue-500 pb-2;
    }

    /* Page Title */
    .page-title {
        @apply text-5xl font-extrabold text-slate-900 text-center mb-8 pb-3 relative;
    }

    .page-title::after {
        @apply content-[''] w-20 h-1.5 bg-blue-600 absolute bottom-0 left-1/2 transform -translate-x-1/2 rounded-full;
    }

    /* Empty Text */
    .empty-text {
        @apply text-lg font-semibold text-slate-600 text-center italic;
    }

    .welcome-message {
        @apply mb-6 p-4 bg-blue-100 text-blue-800 rounded-md shadow-sm;
    }
  </style>

</head>

<body class="container mx-auto mt-10 mb-10 max-w-3xl">
  @include('alerts.alert')

  @if (!request()->is('login') && !request()->is('register'))
    <header class="mb-8">
        <nav class="flex justify-between items-center bg-gray-200 p-4 rounded-md shadow-sm">
            <div>
              <a href="{{ route('books.index') }}" 
                class="text-2xl font-extrabold text-blue-400 hover:text-blue-600 transition duration-300 
                  tracking-wide select-none">
                Library
              </a>
            </div>
            <div class="relative">
                @auth
                    <button id="userMenuButton" 
                        class="flex items-center space-x-2 bg-white text-slate-700 font-medium rounded-md px-4 py-2 shadow-sm ring-1 ring-slate-300 hover:ring-blue-500 hover:text-blue-600 transition duration-300"
                        onclick="toggleDropdown()">
                        <span>{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1 text-sm text-gray-700">
                            <div class="px-4 py-2 border-b border-gray-200 font-semibold">
                                {{ auth()->user()->name }}
                            </div>

                            <a href="{{ route('users.show', auth()->user()) }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>

                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn">Login</a>
                    <a href="{{ route('register') }}" class="btn">Register</a>
                @endguest
            </div>
        </nav>
    </header>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown if clicked outside
        window.addEventListener('click', function(e) {
            const button = document.getElementById('userMenuButton');
            const dropdown = document.getElementById('userDropdown');
            if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
  @endif


  @yield('content')
</body>

</html>
