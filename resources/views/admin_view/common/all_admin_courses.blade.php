@extends('admin_view.layouts.app')

@section('title')
    MediaTTC - Admin All Courses
@endsection

@section('content')
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Courses</h6>
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
                        <th>Title</th>
                        <th>Tagline</th>
                        <th>Teacher</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Starts At</th>
                        <th>Ends At</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Tagline</th>
                        <th>Teacher</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Starts At</th>
                        <th>Ends At</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($all_admin_courses as $course)
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->tagline }}</td>
                            <td>{{ $course->teacher_name }}</td>
                            <td>{{ $course->start_date }}</td>
                            <td>{{ $course->end_date }}</td>
                            <td>{{ $course->start_time }}</td>
                            <td>{{ $course->end_time }}</td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->price }}</td>
                            <td><img width="70px" src="{{ asset('storage/uploads/courses/'.$course->content) }}" alt="course image"></td>
                            <td>{{ $course->create_time }}</td>
                            <td>{{ $course->update_time }}</td>
                            <td>
                                <a href="{{ route('view_course_students', ['course_id'=>$course->course_id]) }}" class="btn btn-sm btn-primary">View Students</a>
                                <br><br>
                                <a href="{{ route('add_students_course_manually', ['course_id'=>$course->course_id]) }}" class="btn btn-sm btn-info">Add Students</a>
                                <br><br>
                                <a href="{{ route('update_courses', ['course_id'=>$course->course_id]) }}" class="btn btn-sm btn-warning">Update</a>
                                <br><br>
                                <a href="{{ route('delete_courses_info', ['course_id'=>$course->course_id]) }}" class="btn btn-sm btn-danger">Delete</a>
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


