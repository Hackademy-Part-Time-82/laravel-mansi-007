<x-app>
    <div class="container mt-5">
        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="inputName" class="form-label">Nome del Libro</label>
                <input type="text" class="form-control" id="inputName" name="name">
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPages" class="form-label">Pagine del Libro</label>
                <input type="text" class="form-control" id="inputPages" name="pages">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="inputYear" class="form-label">Anno del Libro</label>
                <input type="text" class="form-control" id="inputYear" name="year">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="inputImage" class="form-label">Cover del Libro</label>
                <input type="file" class="form-control" id="inputImage" name="image">
                @error('image')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
</x-app>
