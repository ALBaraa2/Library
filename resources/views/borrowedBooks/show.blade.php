<div>
    @foreach ($borrowedBooks as $borrowedBook)
        {{$borrowedBook->user_id}}
        {{$borrowedBook->book_id}}
        <hr>
    @endforeach
</div>
