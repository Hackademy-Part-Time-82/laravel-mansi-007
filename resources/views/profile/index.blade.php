<x-app>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach ($books as $book)
            <div class="col">
                <div class="card">
                    <x-image-book :$book />
                    <div class="card-body">
                        <h5 class="card-title">{{ $book['name'] }}</h5>
                        <a href="{{ route('books.show', ['book' => $book]) }}">Dettaglio</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app>
