<x-app>
    <div class="card border-0 shadow-sm overflow-hidden my-4">
        <div class="row g-0 align-items-center">
            <!-- Colonna Immagine -->
            <div class="col-md-4 text-center bg-light p-3">
                <x-image-book :$book class="img-fluid rounded shadow-sm" />
            </div>

            <!-- Colonna Dettagli -->
            <div class="col-md-8">
                <div class="card-body p-4">
                    <span class="badge bg-primary-subtle text-primary fw-semibold mb-2">
                        Dettagli Libro
                    </span>

                    <h2 class="card-title h3 mb-3 fw-bold text-dark">
                        {{ $book->name }}
                    </h2>

                    <div class="row g-3 pt-2">
                        <div class="col-6 col-sm-4">
                            <div class="p-2 border rounded bg-body-tertiary text-center">
                                <small class="text-muted d-block text-uppercase fw-semibold"
                                    style="font-size: 0.75rem;">Anno</small>
                                <span class="fw-bold text-dark">{{ $book->year ?? 'N/D' }}</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="p-2 border rounded bg-body-tertiary text-center">
                                <small class="text-muted d-block text-uppercase fw-semibold"
                                    style="font-size: 0.75rem;">Pagine</small>
                                <span class="fw-bold text-dark">{{ $book->pages ?? 'N/D' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
