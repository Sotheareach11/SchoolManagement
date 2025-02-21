@extends('backend.layouts.master')

@section('title', 'Courses')

@section('content')
<a href="{{ url('/backend/courses/create') }}" class="btn btn-outline-success mb-2">
    <i class="fas fa-plus mr-2"></i>
    Create
</a>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Courses List</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th style="width: 60px">Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $index => $course)
                <tr>
                    <td>{{ $index + 1 }}.</td>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>${{ number_format($course->course_price, 2) }}</td>
                    <td>{{ $course->course_desc ?? '-' }}</td>
                    <td>
                        @if ($course->active)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-info">
                            <i class="fas fa-eye mr-2"></i>
                            View
                        </button>
                        <button type="button" class="btn btn-outline-success">
                            <i class="fas fa-pen mr-2"></i>
                            Edit
                        </button>
                        <button type="button" class="btn btn-outline-danger">
                            <i class="fas fa-trash mr-2"></i>
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex flex-row-reverse pr-4">
        {{ $courses->links() }}
    </div>
    <!-- /.card-body -->
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@if (session('message'))
<script>
$(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Success',
        body: '{{ session('
        message ') }}'
    });
});
</script>
@endif
@endsection