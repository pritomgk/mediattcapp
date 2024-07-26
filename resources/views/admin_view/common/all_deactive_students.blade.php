@extends('admin_view.layouts.app')

@section('title')
    MediaTTC - All Deactive Students
@endsection

@section('content')
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Deactive Students</h6>
    </div>
    @if (session()->has('error'))
      <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
    @endif
    @if (session()->has('success'))
      <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Serial NO.</th>
                        <th>Fathers Name</th>
                        <th>Course</th>
                        <th>Certificate Serial</th>
                        <th>Registration NO.</th>
                        <th>Grade</th>
                        <th>Address</th>
                        <th>Document</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Serial NO.</th>
                        <th>Name</th>
                        <th>Fathers Name</th>
                        <th>Course</th>
                        <th>Certificate Serial</th>
                        <th>Registration NO.</th>
                        <th>Grade</th>
                        <th>Address</th>
                        <th>Document</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($all_deactive_students as $deactive_student)
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $deactive_student->serial_no }}</td>
                            <td>{{ $deactive_student->name }}</td>
                            <td>{{ $deactive_student->father_name }}</td>
                            <td>
                                @foreach($deactive_student_courses as $deactive_student_course)
                                @if($deactive_student_course->course_id == $deactive_student->course_id)
                                {{ $deactive_student_course->title }}
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $deactive_student->certificate_serial }}</td>
                            <td>{{ $deactive_student->regi_no }}</td>
                            <td><span class="text-uppercase">{{ $deactive_student->grade }}</span></td>
                            <td>{{ $deactive_student->address }}</td>
                            <td>
                                @if($deactive_student->document != '')
                                    <a href="{{ asset('storage/uploads/document/'.$deactive_student->document) }}" download="{{ $deactive_student->document }}"><img width="118.2px" height="141.8px" src="{{ asset('storage/uploads/document/'.$deactive_student->document) }}"></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('activate_student', ['student_id'=>$deactive_student->student_id]) }}" class="btn btn-sm btn-warning">Admit</a>
                                <br><br>
                                <a href="{{ route('delete_student', ['student_id'=>$deactive_student->student_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                            $sl++;
                        @endphp
                    @endforeach
                    {{-- <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td>$162,700</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


