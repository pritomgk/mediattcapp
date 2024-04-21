@extends('admin_view.layouts.app')

@section('title')
  MediaTTC - Update Student Info
@endsection

@section('content')

<div class="site-section mt-5">
    <div class="container mt-5">
        <form action="{{ route('admin_update_student_info') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group mb-4 mx-auto text-center">
                    <h3>Update Student Info</h3>
                </div>
            </div>
            @if (session()->has('error'))
              <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
            @endif
            @if (session()->has('success'))
              <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
            @endif
            <div class="row">
                <div class="col-md-6 form-group mt-5">
                    <b class="text-secondary"> The <span class="text-warning">*</span> given are mandatory!</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="name"><span class="text-warning">*</span> Full Name</label>
                    <input type="text" id="name" required value="{{ $admin_update_student->name }}" name="name" class="form-control form-control-lg" />
                    @error('name')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="email"> Email Address</label>
                    <input type="email" id="email" value="{{ $admin_update_student->email }}" name="email" class="form-control form-control-lg" />
                    @error('email')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="phone"> Phone Number</label>
                    <input type="text" id="phone" value="{{ $admin_update_student->phone }}" name="phone" class="form-control form-control-lg" />
                    @error('phone')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="father_name"> Father Name</label>
                    <input type="text" id="father_name" value="{{ $admin_update_student->father_name }}" name="father_name" class="form-control form-control-lg" />
                    @error('father_name')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" id="mother_name" value="{{ $admin_update_student->mother_name }}" name="mother_name" class="form-control form-control-lg" />
                    @error('mother_name')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="birth_date"><span class="text-warning">*</span> Birthday</label>
                    <input type="date" id="birth_date" required value="{{ $admin_update_student->birth_date }}" name="birth_date" class="form-control form-control-lg" />
                    @error('birth_date')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="serial_no"> Serial NO.</label>
                    <input type="text" id="serial_no" value="{{ $admin_update_student->serial_no }}" name="serial_no" class="form-control form-control-lg" />
                    @error('serial_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="grade"> Result (Grade)</label>
                    <input type="text" id="grade" value="{{ $admin_update_student->grade }}" name="grade" class="form-control form-control-lg" />
                    @error('grade')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="certificate_serial"> Certificate Serial</label>
                    <input type="text" id="certificate_serial" value="{{ $admin_update_student->certificate_serial }}" name="certificate_serial" class="form-control form-control-lg" />
                    @error('certificate_serial')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="regi_no"> Registration NO.</label>
                    <input type="text" id="regi_no" value="{{ $admin_update_student->regi_no }}" name="regi_no" class="form-control form-control-lg" />
                    @error('regi_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ssc_roll_no"><span class="text-warning">*</span> SSC Roll NO.</label>
                    <input type="number" id="ssc_roll_no" required value="{{ $admin_update_student->ssc_roll_no }}" name="ssc_roll_no" class="form-control form-control-lg" />
                    @error('ssc_roll_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_roll_no"> HSC Roll NO.</label>
                    <input type="text" id="hsc_roll_no" value="{{ $admin_update_student->hsc_roll_no }}" name="hsc_roll_no" class="form-control form-control-lg" />
                    @error('hsc_roll_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ssc_year"> SSC Year</label>
                    <input type="text" id="ssc_year" value="{{ $admin_update_student->ssc_year }}" name="ssc_year" class="form-control form-control-lg" />
                    @error('ssc_year')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_year"> HSC Year</label>
                    <input type="text" id="hsc_year" value="{{ $admin_update_student->hsc_year }}" name="hsc_year" class="form-control form-control-lg" />
                    @error('hsc_year')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="ssc_from"> SSC Passing Institution</label>
                    <input type="text" id="ssc_from" value="{{ $admin_update_student->ssc_from }}" name="ssc_from" class="form-control form-control-lg" />
                    @error('ssc_from')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="hsc_from"> HSC Passing Institution</label>
                    <input type="text" id="hsc_from" value="{{ $admin_update_student->hsc_from }}" name="hsc_from" class="form-control form-control-lg" />
                    @error('hsc_from')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ssc_regi_no"> SSC Registration NO.</label>
                    <input type="text" id="ssc_regi_no" value="{{ $admin_update_student->ssc_regi_no }}" name="ssc_regi_no" class="form-control form-control-lg" />
                    @error('ssc_regi_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_regi_no"> HSC Registration NO.</label>
                    <input type="text" id="hsc_regi_no" value="{{ $admin_update_student->hsc_regi_no }}" name="hsc_regi_no" class="form-control form-control-lg" />
                    @error('hsc_regi_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ssc_grade"><span class="text-warning">*</span> SSC Passing Grade</label>
                    <input type="text" id="ssc_grade" required value="{{ $admin_update_student->ssc_grade }}" name="ssc_grade" class="form-control form-control-lg" />
                    @error('ssc_grade')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_grade"> HSC Passing Grade</label>
                    <input type="text" id="hsc_grade" value="{{ $admin_update_student->hsc_grade }}" name="hsc_grade" class="form-control form-control-lg" />
                    @error('hsc_grade')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="col-md-6 form-group">
                        <label for="gender"><span class="text-warning">*</span> Gender</label> <br>
                        <input <?= $admin_update_student->gender == 1 ? 'checked' : '' ?> type="radio" name="gender" value="1" /> Male <br>
                        <input <?= $admin_update_student->gender == 2 ? 'checked' : '' ?> type="radio" name="gender" value="2" /> Female <br>
                        <input <?= $admin_update_student->gender == 3 ? 'checked' : '' ?> type="radio" name="gender" value="3" /> Other <br>
                        @error('gender')
                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="course_id"><span class="text-warning">*</span> Select Course</label>
                    <select name="course_id" id="course_id" required class="form-control form-control-lg">
                        {{-- <option value="">Choose..</option> --}}
                        @foreach ($courses as $course)
                        @if ($admin_update_student->course_id == $course->course_id)
                        <option value="{{ $course->course_id }}">{{ $course->title }}</option>
                        @else
                        <option value="{{ $course->course_id }}">{{ $course->title }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('course_id')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="address"><span class="text-warning">*</span> Address</label>
                    <input type="text" id="address" required value="{{ $admin_update_student->address }}" name="address" class="form-control form-control-lg" />
                    @error('address')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <p class="text-warning text-center"> You have to provide passport size photo..</p>
                <div class="col-md-12 form-group">
                    <label for="document"> Photo</label>
                    <input type="file" id="document" name="document" class="form-control form-control-lg" />
                    <input type="hidden" hidden id="student_id" value="{{ $admin_update_student->student_id }}" name="student_id" class="form-control form-control-lg" />
                    @error('document')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12 form-group">
                    <label for="message">Message</label>
                    <textarea name id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12 text-center">
                    <input type="submit" value="Update Student" class="btn btn-primary btn-lg px-5" />
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


