@extends('public_view.layout.app')

@section('title')
  Media TTC - Admission
@endsection

@section('content')

<div class="site-section mt-5">
    <div class="container mt-5">
        <form action="{{ route('admission_apply') }}" method="POST" enctype="multipart/form-data">
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
                <div class="col-md-6 form-group mt-5">
                    <b class="text-secondary"> The <span class="text-warning">*</span> given are mandatory!</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="fname"><span class="text-warning">*</span> First Name</label>
                    <input type="text" id="fname" required name="fname" class="form-control form-control-lg" />
                    @error('fname')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname"><span class="text-warning">*</span> Last Name</label>
                    <input type="text" id="lname" required name="lname" class="form-control form-control-lg" />
                    @error('lname')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="email"><span class="text-warning">*</span> Email Address</label>
                    <input type="email" id="email" required name="email" class="form-control form-control-lg" />
                    @error('email')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="phone"><span class="text-warning">*</span> Phone Number</label>
                    <input type="text" id="phone" required name="phone" value="+880" class="form-control form-control-lg" />
                    @error('phone')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="father_name"><span class="text-warning">*</span> Father Name</label>
                    <input type="text" id="father_name" required name="father_name" class="form-control form-control-lg" />
                    @error('father_name')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" id="mother_name" name="mother_name" class="form-control form-control-lg" />
                    @error('mother_name')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="birth_date"><span class="text-warning">*</span> Birthday</label>
                    <input type="date" id="birth_date" required name="birth_date" class="form-control form-control-lg" />
                    @error('birth_date')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ssc_roll_no"><span class="text-warning">*</span> SSC Roll NO.</label>
                    <input type="text" id="ssc_roll_no" required name="ssc_roll_no" class="form-control form-control-lg" />
                    @error('ssc_roll_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_roll_no"> HSC Roll NO.</label>
                    <input type="text" id="hsc_roll_no" name="hsc_roll_no" class="form-control form-control-lg" />
                    @error('hsc_roll_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ssc_year"><span class="text-warning">*</span> SSC Year</label>
                    <input type="text" id="ssc_year" required name="ssc_year" class="form-control form-control-lg" />
                    @error('ssc_yeat')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_year"> HSC Year</label>
                    <input type="text" id="hsc_year" name="hsc_year" class="form-control form-control-lg" />
                    @error('hsc_year')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="ssc_from"><span class="text-warning">*</span> SSC Passing Institution</label>
                    <input type="text" id="ssc_from" required name="ssc_from" class="form-control form-control-lg" />
                    @error('ssc_from')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="hsc_from"> HSC Passing Institution</label>
                    <input type="text" id="hsc_from" name="hsc_from" class="form-control form-control-lg" />
                    @error('hsc_from')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ssc_regi_no"><span class="text-warning">*</span> SSC Registration NO.</label>
                    <input type="text" id="ssc_regi_no" required name="ssc_regi_no" class="form-control form-control-lg" />
                    @error('ssc_regi_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_regi_no"> HSC Registration NO.</label>
                    <input type="text" id="hsc_regi_no" name="hsc_regi_no" class="form-control form-control-lg" />
                    @error('hsc_regi_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ssc_grade"><span class="text-warning">*</span> SSC Passing Grade</label>
                    <input type="text" id="ssc_grade" required name="ssc_grade" class="form-control form-control-lg" />
                    @error('ssc_grade')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_grade"> HSC Passing Grade</label>
                    <input type="text" id="hsc_grade" name="hsc_grade" class="form-control form-control-lg" />
                    @error('hsc_grade')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="col-md-6 form-group">
                        <label for="gender"><span class="text-warning">*</span> Gender</label> <br> <br>
                        <input type="radio" name="gender" value="1" /> Male <br>
                        <input type="radio" name="gender" value="2" /> Female <br>
                        <input type="radio" name="gender" value="3" /> Other <br>
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
                    <label for="address"><span class="text-warning">*</span> Address</label>
                    <input type="text" id="address" required name="address" class="form-control form-control-lg" />
                    @error('address')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="password"><span class="text-warning">*</span> Password</label>
                    <input type="password" id="password" required name="password" class="form-control form-control-lg" />
                    @error('password')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <p class="text-warning text-center"> You may provide .zip file..</p>
                <div class="col-md-12 form-group">
                    <label for="document"><span class="text-warning">*</span> Document</label>
                    <input type="file" id="document" name="document" class="form-control form-control-lg" />
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
                    <input type="submit" value="Submit" class="btn btn-primary btn-lg px-5" />
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


