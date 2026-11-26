@extends('layouts.app')

@section('title', 'Profil Saya - KursusKu Pisang Pride')

@section('content')
<div class="card shadow-sm form-card">
    <div class="card-header form-card-header"><h1 class="h4 mb-0">Profil Saya</h1></div>
    <div class="card-body">
        <p class="mb-1">Selamat datang, <strong>{{ $user->name }}</strong>.</p>
        <table class="table table-borderless w-auto">
            <tr><td>Nama</td><td>: {{ $user->name }}</td></tr>
            <tr><td>Email</td><td>: {{ $user->email }}</td></tr>
            <tr><td>Role</td><td>: <span class="badge text-bg-warning">{{ $user->role }}</span></td></tr>
        </table>
        <a href="{{ route('courses.index') }}" class="btn btn-success">Lihat Kursus</a>
        <a href="{{ route('enrollments.create') }}" class="btn btn-outline-secondary">Pendaftaran</a>
    </div>
</div>
@endsection