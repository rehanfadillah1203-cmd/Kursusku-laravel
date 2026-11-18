@extends('layouts.app')

@section('title', 'Laporan Enrollment - KursusKu Pisang Pride')

@section('content')
<div class="card shadow-sm form-card">
    <div class="card-header form-card-header d-flex justify-content-between align-items-center">
        <h1 class="h4 mb-0">Laporan Enrollment</h1>
        <a href="{{ route('enrollments.create') }}" class="btn btn-sm btn-success">+ Pendaftaran Baru</a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Participant</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enrollments as $enrollment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $enrollment->participant->name }}</td>
                            <td>{{ $enrollment->participant->email }}</td>
                            <td>{{ $enrollment->course->code }} - {{ $enrollment->course->name }}</td>
                            <td><span class="badge text-bg-warning">{{ $enrollment->status }}</span></td>
                            <td>{{ $enrollment->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary">Belum ada data enrollment.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection