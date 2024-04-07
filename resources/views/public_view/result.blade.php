@extends('public_view.layout.app')

@section('title')
  Media TTC - Admission
@endsection

@section('content')

<div class="site-section mt-5">
    <div class="container mt-5">
        <form action="{{ route('result_check') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group mb-4 mx-auto text-center">
                    <h3>Apply For Admission</h3>
                </div>
            </div>
            @if (session()->has('error'))
              <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
            @endif
            @if (session()->has('success'))
              <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
            @endif
            
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="course_id"><span class="text-warning">*</span> Select Course</label>
                    <select name="course_id" id="course_id" required class="form-control form-control-lg">
                        <option value="">Choose..</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->course_id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="serial_no"> Serial NO.</label>
                    <input type="text" id="serial_no" name="serial_no" class="form-control form-control-lg" />
                    @error('serial_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <input type="submit" value="Search" class="btn btn-primary btn-lg px-5" />
                </div>
            </div>
        </form>
        @if (!empty($result_check))
        <div class="row mt-5">
            <div class="col-12 text-center">
                <p>
                    <b>Name :</b> {{ $result_check->name }} <br>
                    <b>Father's Name :</b> {{ $result_check->father_name }} <br>
                    <b>Serial NO. :</b> {{ $result_check->serial_no }} <br>
                    <b>Registration NO. :</b> {{ $result_check->regi_no }} <br>
                    <b>Grade :</b> {{ $result_check->grade }} <br>
                    <b>Address :</b> {{ $result_check->address }} <br>
                </p>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection


