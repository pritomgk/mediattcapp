@extends('public_view.layout.app')

@section('title')
  Media TTC - Result
@endsection

@section('content')

<div class="site-section mt-5">
    <div class="container mt-5">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Serial NO.</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Fathers Name</th>
                    <th>Course</th>
                    <th>Course Duration</th>
                    {{-- <br> mm/dd/yyyy --}}
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
                @php
                    $sl = 1;
                @endphp
                @foreach ($institution_results as $institution_result)
                    <tr>
                        <td>{{ $institution_result->serial_no }}</td>
                        <td>
                            @if($institution_result->document != '')
                            <a href="{{ asset('storage/uploads/document/'.$institution_result->document) }}" download="{{ $institution_result->document }}"><img width="118.2px" height="141.8px" src="{{ asset('storage/uploads/document/'.$institution_result->document) }}"></a>
                            @endif
                        </td>
                        <td>{{ $institution_result->name }}</td>
                        <td>{{ $institution_result->father_name }}</td>
                        <td>
                            @foreach($institution_result_courses as $institution_result_course)
                            @if($institution_result_course->course_id == $institution_result->course_id)
                            {{ $institution_result_course->title }}
                            @endif
                            @endforeach
                        </td>
                        {{-- <td>
                            @foreach($institution_result_courses as $institution_result_course)
                            @if($institution_result_course->course_id == $institution_result->course_id)
                            <input type="date" name="" value="{{ $institution_result_course->start_date }}" disabled id=""><br> to <br>
                            <input type="date" name="" value="{{ $institution_result_course->end_date }}" disabled id="">
                            @endif
                            @endforeach
                        </td> --}}
                        <td>{{ $institution_result->course_start }} to {{ $institution_result->course_end }}</td>
                        <td>{{ $institution_result->certificate_serial }}</td>
                        <td>{{ $institution_result->regi_no }}</td>
                        <td>{{ $institution_result->grade }}</td>
                        <td>{{ $institution_result->address }}</td>
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

@endsection


