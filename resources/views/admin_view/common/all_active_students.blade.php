@extends('admin_view.layouts.app')

@section('title')
    MediaTTC - All Active Students
@endsection

@section('content')
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Active Students</h6>
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
                        <th>Course Start</th>
                        <th>Course End</th>
                        <th>Certificate Serial</th>
                        <th>Registration NO.</th>
                        <th>Grade</th>
                        <th>Address</th>
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
                        <th>Course Start</th>
                        <th>Course End</th>
                        <th>Certificate Serial</th>
                        <th>Registration NO.</th>
                        <th>Grade</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $sl = $all_active_students->count();
                    @endphp
                    @foreach ($all_active_students as $active_student)
                        <tr>
                            <td>{{ $sl }}</td>
                            {{-- <td>{{ $active_student->serial_no }}</td> --}}
                            <td>
                                @if($active_student->document != '')
                                <a href="{{ asset('storage/uploads/document/'.$active_student->document) }}" download="{{ $active_student->document }}"><img width="118.2px" height="141.8px" src="{{ asset('storage/uploads/document/'.$active_student->document) }}"></a>
                                @endif
                            </td>
                            <td>{{ $active_student->name }}</td>
                            <td>{{ $active_student->father_name }}</td>
                            <td>
                                @foreach($active_student_courses as $active_student_course)
                                @if($active_student_course->course_id == $active_student->course_id)
                                {{ $active_student_course->title }}
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $active_student->course_start }}</td>
                            <td>{{ $active_student->course_end }}</td>
                            <td>{{ $active_student->certificate_serial }}</td>
                            <td>{{ $active_student->regi_no }}</td>
                            <td><span class="text-uppercase">{{ $active_student->grade }}</span></td>
                            <td>{{ $active_student->address }}</td>
                            <td>
                                <a href="{{ route('admin_update_student', ['student_id'=>$active_student->student_id]) }}" class="btn btn-sm btn-warning">Update</a>
                                <br><br>
                                <a href="{{ route('deactivate_student', ['student_id'=>$active_student->student_id]) }}" class="btn btn-sm btn-danger">Deactivate</a>
                                <br><br>
                                <a href="{{ route('delete_student', ['student_id'=>$active_student->student_id]) }}" class="btn btn-sm btn-danger">Delete</a>
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


