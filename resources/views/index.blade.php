<x-app>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach ($books as $book)
            <div class="col">
                <div class="card">
                    <x-image-book :$book />
                    <div class="card-body">
                        <h5 class="card-title">{{ $book['name'] }}</h5>
                        <a href="{{ route('books.show', ['book' => $book]) }}">Dettaglio</a>
                        @auth
                            @if (Auth::user()->id == $book->user_id)
                                <a href="{{ route('books.edit', ['book' => $book]) }}">Modifica</a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#form-destroy">
                                    Elimina
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="form-destroy" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('books.destroy', ['book' => $book]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger" type="submit">Elimina</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app>
