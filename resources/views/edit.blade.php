<x-app>
    <div class="container mt-5">
        <form action="{{ route('books.update', ['book' => $book]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="inputName" class="form-label">Nome del Libro</label>
                <input type="text" class="form-control" id="inputName" name="name" value="{{ $book->name }}">
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPages" class="form-label">Pagine del Libro</label>
                <input type="text" class="form-control" id="inputPages" name="pages" value="{{ $book->pages }}">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="inputYear" class="form-label">Anno del Libro</label>
                <input type="text" class="form-control" id="inputYear" name="year" value="{{ $book->year }}">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="inputYear" class="form-label">Autore</label>
                <select class="form-select" aria-label="Default select example" name="author_id">
                    @foreach ($authors as $author)
                        <option @if ($author->id == $book->author_id) selected @endif value="{{ $author->id }}">
                            {{ $author->firstname }} {{ $author->lastname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                @foreach ($categories as $category)
                    <div class="form-check">

                        <input class="form-check-input" @checked($book->categories->contains($category->id)) type="checkbox" name="categories[]"
                            value="{{ $category->id }}" id="checkDefault-{{ $category->id }}">

                        <label class="form-check-label" for="checkDefault-{{ $category->id }}">

                            {{ $category->name }}
                        </label>

                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <div class="col-md-4 text-center bg-light p-3">
                    <x-image-book :$book class="img-fluid rounded shadow-sm" />
                </div>
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
