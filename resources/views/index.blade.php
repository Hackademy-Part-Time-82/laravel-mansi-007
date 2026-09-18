<x-app>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <ul>
        @foreach ($books as $book)
            <li>Il libro {{ $book['name'] }} ha {{ $book->pages }} pagine</li>
        @endforeach


    </ul>
</x-app>
