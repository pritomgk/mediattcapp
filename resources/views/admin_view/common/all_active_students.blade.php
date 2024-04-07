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
                        <th>Serial NO.</th>
                        <th>Name</th>
                        <th>Fathers Name</th>
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
                        <th>Serial NO.</th>
                        <th>Name</th>
                        <th>Fathers Name</th>
                        <th>Certificate Serial</th>
                        <th>Registration NO.</th>
                        <th>Grade</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($all_active_students as $active_student)
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $active_student->serial_no }}</td>
                            <td>{{ $active_student->name }}</td>
                            <td>{{ $active_student->father_name }}</td>
                            <td>{{ $active_student->certificate_serial }}</td>
                            <td>{{ $active_student->regi_no }}</td>
                            <td>{{ $active_student->grade }}</td>
                            <td>{{ $active_student->address }}</td>
                            <td>
                                <a href="{{ route('admin_update_student', ['student_id'=>$active_student->student_id]) }}" class="btn btn-sm btn-warning">Update</a>
                                <br><br>
                                <a href="{{ route('deactivate_student', ['student_id'=>$active_student->student_id]) }}" class="btn btn-sm btn-danger">Deactivate</a>
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


