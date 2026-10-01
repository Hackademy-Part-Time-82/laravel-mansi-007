<x-app>
    <div class="container mt-5">
        <form action="{{ route('authors.update', ['author' => $author]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="inputName" class="form-label">Nome dell'autore</label>
                <input type="text" class="form-control" id="inputName" name="firstname" value="{{ $author->firstname }}">
                @error('firstname')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputName2" class="form-label">Cognome dell'autore</label>
                <input type="text" class="form-control" id="inputName2" name="lastname"
                    value="{{ $author->lastname }}">
                @error('lastname')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
</x-app>
