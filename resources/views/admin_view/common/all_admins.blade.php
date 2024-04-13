@extends('admin_view.layouts.app')

@section('title')
    MediaTTC - All Active Admins
@endsection

@section('content')
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Active Admins</h6>
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
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($all_admins as $all_admin)
                        @if ($all_admin->email != 'pritomguha62@gmail.com')
                            <form action="{{ route('update_admin') }}" method="post">
                                <tr>
                                    @csrf
                                    <td>{{ $sl }}</td>
                                    {{-- <td>{{ $all_admin->serial_no }}</td> --}}
                                    <td>{{ $all_admin->name }}</td>
                                    <td><a href="mailto:{{ $all_admin->email }}">{{ $all_admin->email }}</a></td>
                                    <td><a href="tel:{{ $all_admin->phone }}">{{ $all_admin->phone }}</a></td>
                                    <td>{{ $all_admin->birth_date }}</td>
                                    <td>
                                        <select name="status" id="" class="form-control">
                                            <option selected value="{{ $all_admin->status }}">
                                                @if ($all_admin->status == 1)
                                                    Active
                                                @else
                                                    Deactive
                                                @endif
                                            </option>
                                            <option value="1">Activate</option>
                                            <option value="0">Deactivate</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="role_id" id="" class="form-control">
                                            <option selected value="{{ $all_admin->role_id }}">
                                                @if ($all_admin->role_id == 1)
                                                    Admin
                                                @else
                                                    Teacher
                                                @endif
                                            </option>
                                            <option value="1">Admin</option>
                                            <option value="2">Teacher</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="hidden" name="admin_id" hidden value="{{ $all_admin->admin_id }}">

                                        <input type="submit" class="btn btn-sm btn-success" value="Upadate">
                                        
                                        <a href="{{ route('delete_admin', ['admin_id'=>$all_admin->admin_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </form>
                        @endif
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


