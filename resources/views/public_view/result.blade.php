@extends('public_view.layout.app')

@section('title')
  Media TTC - Result
@endsection

@section('content')

<div class="site-section mt-5">
    <div class="container mt-5" id="result">
        <form action="{{ route('result_check') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group mb-4 mx-auto text-center">
                    <h3>Check Result</h3>
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
                    <label for="certificate_serial"> Certificate Serial NO.</label>
                    <input type="text" id="certificate_serial" name="certificate_serial" class="form-control form-control-lg" />
                    @error('certificate_serial')
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
        <div class="row mt-5 mb-3">
            <hr>
            <div class="col-12 text-center mt-3">
                <p class="mt-3">
                    @if (!empty($result_check->document))
                        <div class="mt-3 mb-5"><img width="197px" height="236.333333333px" src="{{ asset('storage/uploads/document/'.$result_check->document) }}"></div>
                        @else
                        <b class="border border-primary">No image..</b>
                    @endif
                    <div class="mt-3">
                        <b>Name :</b> {{ $result_check->name }} <br>
                        <b>Father's Name :</b> {{ $result_check->father_name }} <br>
                        <b>Serial NO. :</b> {{ $result_check->serial_no }} <br>
                        <b>Registration NO. :</b> {{ $result_check->regi_no }} <br>
                        <b>Grade :</b> {{ $result_check->grade }} <br>
                        <b>Address :</b> {{ $result_check->address }} <br> <br>
                        <button class="btn btn-primary" id="download"> Download pdf</button> <br>
                    </div>
                </p>
                {{-- <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Serial NO.</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Fathers Name</th>
                                    <th>Course</th>
                                    <th>Course Duration</th>
                                    <th>Certificate Serial</th>
                                    <th>Registration NO.</th>
                                    <th>Grade</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Serial NO.</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Fathers Name</th>
                                    <th>Course</th>
                                    <th>Course Duration</th>
                                    <th>Certificate Serial</th>
                                    <th>Registration NO.</th>
                                    <th>Grade</th>
                                    <th>Address</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                    <tr>
                                        <td>{{ $result_check->serial_no }}</td>
                                        <td>
                                            @if($result_check->document != '')
                                            <a href="{{ asset('storage/uploads/document/'.$result_check->document) }}" download="{{ $result_check->document }}"><img width="118.2px" height="141.8px" src="{{ asset('storage/uploads/document/'.$result_check->document) }}"></a>
                                            @endif
                                        </td>
                                        <td>{{ $result_check->name }}</td>
                                        <td>{{ $result_check->father_name }}</td>
                                        <td>
                                            @foreach($courses as $course)
                                            @if($course->course_id == $result_check->course_id)
                                            {{ $course->title }}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $result_check->course_start }} to {{ $result_check->course_end }}</td>
                                        <td>{{ $result_check->certificate_serial }}</td>
                                        <td>{{ $result_check->regi_no }}</td>
                                        <td>{{ $result_check->grade }}</td>
                                        <td>{{ $result_check->address }}</td>
                                    </tr>
                            </tbody>
                        </table> 
                        <br> <br>
                        <button class="btn btn-primary" id="download"> Download pdf</button> <br>
                    </div>
                </div> --}}
            </div>
        </div>
        @endif
    </div>
</div>

@endsection


