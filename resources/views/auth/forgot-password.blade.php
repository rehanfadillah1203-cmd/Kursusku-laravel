@extends('layouts.app')

@section('title', 'Lupa Password - KursusKu Pisang Pride')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm form-card">
            <div class="card-header form-card-header"><h1 class="h4 mb-0">Lupa Password</h1></div>
            <div class="card-body p-4">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button class="btn btn-success w-100" type="submit">Kirim Link Reset</button>
                    <a href="{{ route('login') }}" class="d-block text-center mt-3">Kembali ke login</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection