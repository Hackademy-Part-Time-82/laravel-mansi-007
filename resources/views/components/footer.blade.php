<div>
    <hr>
    Test
    @foreach ($books as $book)
        <li>Il libro {{ $book['name'] }} ha {{ $book->pages }} pagine</li>
    @endforeach
</div>
