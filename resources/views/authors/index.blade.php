<x-app>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('authors.create') }}">Crea Autore</a>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach ($authors as $author)
            <div class="col">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">{{ $author['firstname'] }} {{ $author['lastname'] }}</h5>
                        <h5 class="card-title">Libri Scritti: {{ $author->books->count() }}</h5>
                        <a href="{{ route('authors.show', ['author' => $author]) }}">Dettaglio</a>
                        <a href="{{ route('authors.edit', ['author' => $author]) }}">Modifica</a>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#form-destroy-{{ $author->id }}">
                            Elimina
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="form-destroy-{{ $author->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('authors.destroy', ['author' => $author]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger" type="submit">Elimina</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app>
