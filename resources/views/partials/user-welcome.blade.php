{{-- resources/views/partials/user-welcome.blade.php --}}
<div class="mb-6 p-4 bg-blue-100 text-blue-800 rounded-md shadow-sm">
    @if (Auth::check())
        <p>مرحباً، <span class="font-semibold">{{ Auth::user()->name }}</span></p>

        @if (!Auth::user()->role || Auth::user()->role !== 'admin')
            <p class="mt-2 text-gray-700">هنا راح تظهر الكتب اللي اشتريتها أو ملاحظات خاصة فيك.</p>
        @endif
    @else
        <p>مرحباً بك زائرنا الكريم</p>
    @endif
</div>
