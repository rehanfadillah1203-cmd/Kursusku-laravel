@extends('layouts.app')

@section('title', 'Edit Course - KursusKu')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <span class="eyebrow">UPDATE</span>
                <h1 class="h2 mb-0">Edit Course</h1>
            </div>
            <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-secondary">Batal</a>
        </div>

       <form method="POST" action="{{ route('courses.update', $course) }}" novalidate class="card card-body shadow-sm border-0 p-4">
          @csrf
          @method('PUT')

            @include('courses._form')

            <div class="mt-4 d-flex gap-2">
                <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection