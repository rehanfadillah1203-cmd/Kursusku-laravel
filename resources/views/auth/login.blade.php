@extends('layouts.app')

@section('title', 'Login - KursusKu Pisang Pride')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm form-card">
            <div class="card-header form-card-header"><h1 class="h4 mb-0">Login</h1></div>
            <div class="card-body p-4">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login.attempt') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror" required autofocus>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" required>
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">Lihat</button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <a href="{{ route('password.request') }}">Lupa password?</a>
                    </div>

                    <button class="btn btn-success w-100" type="submit">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const input = document.getElementById('password');
        const show = input.type === 'password';
        input.type = show ? 'text' : 'password';
        this.textContent = show ? 'Sembunyikan' : 'Lihat';
    });
</script>
@endsection