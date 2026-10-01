<x-app>
    <div class="card border-0 shadow-sm overflow-hidden my-4">
        <div class="row g-0 align-items-center">

            <!-- Colonna Dettagli -->
            <div class="col-md-8">
                <div class="card-body p-4">
                    <span class="badge bg-primary-subtle text-primary fw-semibold mb-2">
                        Dettagli AUTORE
                    </span>

                    <h2 class="card-title h3 mb-3 fw-bold text-dark">
                        {{ $author->firstname }} {{ $author->lastname }}
                    </h2>
                    <div class="row row-cols-1 row-cols-md-5 g-4">

                        @foreach ($author->books as $book)
                            <div class="col">
                                <div class="card">
                                    <x-image-book :$book />
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app>
