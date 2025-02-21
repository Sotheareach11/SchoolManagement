@extends('Backend.layouts.master')

@section('title', 'Teachers')

@section('content')
<a href="{{  route('teacher.create') }}" class="btn btn-outline-success mb-2">
    <i class="fas fa-plus mr-2"></i>
    Create
</a>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Teachers List</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Teacher Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <!-- <th>Photo</th> -->
                    <th>Gender</th>
                    <th>Schedule</th>
                    <th>Major</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $index => $teacher)
                <tr>
                    <td>{{ $index + 1 }}.</td>
                    <td>{{ $teacher->teacher_name }}</td>
                    <td>{{ $teacher->teacher_email }}</td>
                    <td>{{ $teacher->teacher_phone }}</td>
                    <!-- <td>
                                        @if ($teacher->teacher_photo)
                                        <img src="{{ asset('storage/' . $teacher->teacher_photo) }}" alt="Teacher Photo" width="50">
                                        @else
                                        No Photo
                                        @endif
                                    </td> -->
                    <td>{{ $teacher->gender->name ?? '' }}</td>
                    <td>{{ $teacher->schedule->name ?? '' }}</td>
                    <td>{{ $teacher->major->name ?? '' }}</td>
                    <td>{{ $teacher->course->name ?? '' }}</td>
                    <td>{{ $teacher->subject->name ?? '' }}</td>
                    <td>
                        <a href="{{ url('/backend/teachers/' . $teacher->id) }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ url('/backend/teachers/' . $teacher->id . '/edit') }}"
                            class="btn btn-outline-success btn-sm">
                            <i class="fas fa-pen"></i> Edit
                        </a>
                        <form action="{{ url('/backend/teachers/' . $teacher->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex flex-row-reverse pr-4">
        {{ $teachers->links() }}
    </div>
    <!-- /.card-body -->
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@if (session('message'))
<script>
$(function() {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('
        message ') }}',
        timer: 3000,
        showConfirmButton: false
    });
});
</script>
@endif
@endsection