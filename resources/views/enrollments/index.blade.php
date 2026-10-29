@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu Pisang Pride')

@section('content')
<div class="mb-4">
    <span class="badge text-bg-success mb-2">Katalog</span>
    <h1 class="h2 hero-title">Pilih <em>kursus</em> favoritmu</h1>
    <p class="text-secondary mb-0">
        Semua kursus teknologi KursusKu Pisang Pride dalam satu tempat.
    </p>
</div>

<div class="row g-4">
    @foreach ($courses as $id => $course)
        <div class="col-md-6 col-lg-4">
            <div class="card course-card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h2 class="h5">{{ $course['name'] }}</h2>
                    <p class="text-secondary flex-grow-1">
                        {{ $course['description'] }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="seat-badge">
                            {{ $course['remaining'] }} kursi tersisa
                        </span>
                        <a href="{{ route('enrollments.create', ['course' => $id]) }}"
                           class="btn btn-success btn-sm">
                            Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection