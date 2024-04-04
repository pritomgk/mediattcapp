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
                    <label for="eaddress"><span class="text-warning">*</span> Email Address</label>
                    <input type="text" id="eaddress" required name="email" class="form-control form-control-lg" />
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
                <div class="col-md-6 form-group">
                    <label for="ssc_roll_no">SSC Roll NO.</label>
                    <input type="text" id="ssc_roll_no" name="ssc_roll_no" class="form-control form-control-lg" />
                    @error('ssc_roll_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_roll_no"><span class="text-warning">*</span> HSC Roll NO.</label>
                    <input type="text" id="hsc_roll_no" required name="hsc_roll_no" class="form-control form-control-lg" />
                    @error('hsc_roll_no')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ssc_year">SSC Year</label>
                    <input type="text" id="ssc_year" name="ssc_year" class="form-control form-control-lg" />
                    @error('ssc_yeat')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="hsc_year"><span class="text-warning">*</span> HSC Year</label>
                    <input type="text" id="hsc_year" required name="hsc_year" class="form-control form-control-lg" />
                    @error('hsc_year')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="ssc_from">SSC Passing Institution</label>
                    <input type="text" id="ssc_from" name="ssc_from" class="form-control form-control-lg" />
                    @error('ssc_from')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="hsc_from"><span class="text-warning">*</span> HSC Passing Institution</label>
                    <input type="text" id="hsc_from" required name="hsc_from" class="form-control form-control-lg" />
                    @error('hsc_from')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 form-group">
                <label for="ssc_regi_no">SSC Registration NO.</label>
                <input type="text" id="ssc_regi_no" name="ssc_regi_no" class="form-control form-control-lg" />
                @error('ssc_regi_no')
                <p class="mb-0 alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6 form-group">
                <label for="hsc_regi_no"><span class="text-warning">*</span> HSC Registration NO.</label>
                <input type="text" id="hsc_regi_no" required name="hsc_regi_no" class="form-control form-control-lg" />
                @error('hsc_regi_no')
                <p class="mb-0 alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
            <div class="row">
            <div class="col-md-6 form-group">
                <label for="ssc_grade">SSC Passing Grade</label>
                <input type="text" id="ssc_grade" name="ssc_grade" class="form-control form-control-lg" />
                @error('ssc_grade')
                <p class="mb-0 alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6 form-group">
                <label for="hsc_grade"><span class="text-warning">*</span> HSC Passing Grade</label>
                <input type="text" id="hsc_grade" required name="hsc_grade" class="form-control form-control-lg" />
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
                <input type="text" id="password" required name="password" class="form-control form-control-lg" />
                @error('password')
                <p class="mb-0 alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="document"><span class="text-warning">*</span> Document</label>
                <input type="file" id="document" required name="document" class="form-control form-control-lg" />
                @error('file')
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


