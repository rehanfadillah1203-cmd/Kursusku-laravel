@extends('layouts.app')

@section('title', 'Beranda - KursusKu Pisang Pride')

@section('content')
<section class="py-5">
    <div class="row align-items-center g-5">
        <div class="col-lg-6">
            <p class="hero-eyebrow">Belajar web lebih terarah</p>

            <h1 class="display-5 hero-title">
                Bangun skill web bersama <em>KursusKu</em>
            </h1>

            <p class="lead">
                Pelajari langkah demi langkah dari konsep dasar HTML, CSS,
                logika pemrograman PHP, hingga arsitektur modern menggunakan
                Laravel framework.
            </p>

            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('enrollments.create') }}" class="btn btn-success">
                    Daftar Kursus
                </a>
                <a href="{{ route('catalog.index') }}" class="btn btn-outline-pp">
                    Lihat Kursus
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <img src="{{ asset('images/hero-kursus.jpg') }}" alt="Hero Kursus">
        </div>
    </div>
</section>
@endsection