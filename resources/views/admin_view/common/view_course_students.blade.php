@extends('admin_view.layouts.app')

@section('title')
    MediaTTC - Selected Course Students
@endsection

@section('content')
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Selected Course Students</h6>
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
                        {{-- <th>Serial NO.</th> --}}
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Fathers Name</th>
                        <th>Course</th>
                        <th>Certificate Serial</th>
                        <th>Registration NO.</th>
                        <th>Grade</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        {{-- <th>Serial NO.</th> --}}
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Fathers Name</th>
                        <th>Course</th>
                        <th>Certificate Serial</th>
                        <th>Registration NO.</th>
                        <th>Grade</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $sl = $view_course_students->count();
                    @endphp
                    @foreach ($view_course_students as $view_course_student)
                        <tr>
                            <td>{{ $sl }}</td>
                            {{-- <td>{{ $view_course_student->serial_no }}</td> --}}
                            <td>
                                @if($view_course_student->document != '')
                                <a href="{{ asset('storage/uploads/document/'.$view_course_student->document) }}" download="{{ $view_course_student->document }}"><img width="118.2px" height="141.8px" src="{{ asset('storage/uploads/document/'.$view_course_student->document) }}"></a>
                                @endif
                            </td>
                            <td>{{ $view_course_student->name }}</td>
                            <td>{{ $view_course_student->father_name }}</td>
                            <td>
                                @foreach($course_student_courses as $course_student_course)
                                @if($course_student_course->course_id == $view_course_student->course_id)
                                {{ $course_student_course->title }}
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $view_course_student->certificate_serial }}</td>
                            <td>{{ $view_course_student->regi_no }}</td>
                            <td>{{ $view_course_student->grade }}</td>
                            <td>{{ $view_course_student->address }}</td>
                            <td>
                                @if($view_course_student->status == 1)
                                    Active
                                    @else
                                    Deactive
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin_update_student', ['student_id'=>$view_course_student->student_id]) }}" class="btn btn-sm btn-warning">Update</a>
                                <br><br>
                                <a href="{{ route('deactivate_student', ['student_id'=>$view_course_student->student_id]) }}" class="btn btn-sm btn-danger">Deactivate</a>
                                <br><br>
                                <a href="{{ route('delete_student', ['student_id'=>$view_course_student->student_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                            $sl--;
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


