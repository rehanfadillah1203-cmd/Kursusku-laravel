@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - KursusKu Pisang Pride')

@section('content')
@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Terdapat kesalahan pada formulir:</strong>
        <ul class="mb-0 mt-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row justify-content-center g-4">
    <div class="col-lg-4">
        <div class="card shadow-sm form-card h-100">
            <div class="card-header form-card-header">
                <h2 class="h5 mb-0">Informasi Relasi</h2>
            </div>
            <div class="card-body">
                <p class="text-secondary">
                    Formulir ini menghubungkan Peserta (Participant) dengan Kursus (Course)
                    melalui relasi Many-to-Many pada tabel Enrollment.
                </p>
                <ul class="list-unstyled mb-0">
                    <li class="mb-3">✓ <strong>Pencegahan Duplikasi</strong><br>
                        <small class="text-secondary">Satu peserta hanya bisa mendaftar sekali pada kursus yang sama.</small></li>
                    <li class="mb-3">✓ <strong>Kursus Aktif (Open)</strong><br>
                        <small class="text-secondary">Hanya kursus berstatus <em>open</em> yang bisa dipilih.</small></li>
                    <li>✓ <strong>Status Otomatis</strong><br>
                        <small class="text-secondary">Status awal enrollment: <code>registered</code>.</small></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow-sm form-card">
            <div class="card-header form-card-header">
                <h1 class="h4 mb-0">Formulir Pendaftaran</h1>
            </div>
            <div class="card-body p-4">
                <p class="text-secondary">
                    Pilih participant dan course yang akan dihubungkan ke tabel enrollment.
                </p>

                <form method="POST" action="{{ route('enrollments.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="participant_id" class="form-label">Participant <span class="text-danger">*</span></label>
                        <select id="participant_id" name="participant_id"
                                class="form-select @error('participant_id') is-invalid @enderror">
                            <option value="">-- Pilih Participant --</option>
                            @foreach ($participants as $participant)
                                <option value="{{ $participant->id }}"
                                    @selected(old('participant_id') == $participant->id)>
                                    {{ $participant->name }} ({{ $participant->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('participant_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="course_id" class="form-label">Course <span class="text-danger">*</span></label>
                        <select id="course_id" name="course_id"
                                class="form-select @error('course_id') is-invalid @enderror">
                            <option value="">-- Pilih Course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    @selected(old('course_id', request('course')) == $course->id)>
                                    {{ $course->code }} - {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Menampilkan kursus dengan status open.</div>
                    </div>

                    <button class="btn btn-success w-100" type="submit">Simpan Enrollment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect('#participant_id', {
        placeholder: 'Ketik nama participant...',
        allowEmptyOption: true,
        maxOptions: 200,
    });

    new TomSelect('#course_id', {
        placeholder: 'Ketik nama course...',
        allowEmptyOption: true,
    });
</script>
@endsection