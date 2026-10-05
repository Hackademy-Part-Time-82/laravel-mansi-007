<x-app>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('categories.create') }}">Crea Categoria</a>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <h4>{{ $category->name }}</h4>
                    <a href="{{ route('categories.show', ['category' => $category]) }}">Dettaglio</a>
                    <a href="{{ route('categories.edit', ['category' => $category]) }}">Modifica</a>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#form-destroy-{{ $category->id }}">
                        Elimina
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="form-destroy-{{ $category->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('categories.destroy', ['category' => $category]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger" type="submit">Elimina</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</x-app>
