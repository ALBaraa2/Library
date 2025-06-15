@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="page-title">My Borrowed Books</h1>

    @if($borrowedBooks->isEmpty())
        <div class="alert alert-info text-center">
            You haven't borrowed any books yet.
        </div>
    @else
        <div class="row">
            @foreach($borrowedBooks as $borrowedBook)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $borrowedBook->book->title }}</h5>
                            <p class="card-text">
                                <strong>Borrowed At:</strong> {{ $borrowedBook->borrowed_at->format('d M, Y') }} <br>
                                <strong>Due Date:</strong> {{ $borrowedBook->due_date?->format('d M, Y') ?? 'N/A' }} <br>
                                <strong>Status:</strong> <span class="badge bg-primary">{{ ucfirst($borrowedBook->status) }}</span>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('books.show', $borrowedBook->book->id) }}" class="btn btn-primary btn-sm">View Book</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
