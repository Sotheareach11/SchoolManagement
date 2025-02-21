@extends('Backend.layouts.master')

@section('title', 'Create Teacher')

@section('content')
<div class="container mt-4">
    <!-- Validation Messages -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            <!-- Custom validation messages -->
            <li>សូមបំពេញព័ត៌មានគ្រូបង្រៀន!</li>
            @if ($errors->has('dob'))
            <li>The teacher dob field is required.</li>
            @endif
            @if ($errors->has('email'))
            <li>The teacher email field is required.</li>
            @endif
            @if ($errors->has('phone'))
            <li>The teacher phone field is required.</li>
            @endif
            @if ($errors->has('biography'))
            <li>The teacher biography field is required.</li>
            @endif
            @if ($errors->has('file'))
            <li>The teacher photo field is required.</li>
            @endif
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Teacher Code</label>
                    <input type="text" class="form-control" value="CUR{{ now()->format('YmdHis') }}-XXXXXX" disabled>
                    <input type="hidden" name="teacher_code" value="CUR{{ now()->format('YmdHis') }}-XXXXXX">
                </div>

                <div class="mb-3">
                    <label class="form-label">Teacher Name *</label>
                    <input type="text" name="teacher_name"
                        class="form-control @error('teacher_name') is-invalid @enderror">
                    @error('teacher_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth *</label>
                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror">
                    @error('dob')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender_id" class="form-control @error('gender_id') is-invalid @enderror">
                        <option value="">Select Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                    @error('gender_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone *</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Biography</label>
            <textarea name="biography" class="form-control @error('biography') is-invalid @enderror"
                rows="3"></textarea>
            @error('biography')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">File Upload</label>
            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
            @error('file')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection