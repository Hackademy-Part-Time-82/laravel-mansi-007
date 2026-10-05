<x-app>
    <div class="container mt-5">
        <form action="{{ route('categories.update', ['category' => $category]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="inputName" class="form-label">Nome della categoria</label>
                <input type="text" class="form-control" id="inputName" name="name" value="{{ $category->name }}">
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
</x-app>
