<x-app>
    <div class="container mt-5">
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="inputName" class="form-label">Nome Utente</label>
                <input type="text" class="form-control" id="inputName" name="name">
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email Utente</label>
                <input type="email" class="form-control" id="inputEmail" name="email">
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPassword" class="form-label">Inserisci Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password">
                @error('password')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPassword2" class="form-label">Inserisci Password</label>
                <input type="password" class="form-control" id="inputPassword2" name="password_confirmation">
                @error('password_confirmation')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Registrami</button>
        </form>
    </div>
</x-app>
