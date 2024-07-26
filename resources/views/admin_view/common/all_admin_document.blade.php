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
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($all_admin_document as $document)
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $document->title }}</td>
                            <td>{{ $document->description }}</td>
                            <td><img width="70px" src="{{ asset('storage/uploads/gallery/'.$document->document) }}" alt="gallery image"></td>
                            <td>{{ $document->create_time }}</td>
                            <td>
                                <a href="{{ route('update_document', ['doc_id'=>$document->doc_id]) }}" class="btn btn-sm btn-warning">Update</a>
                                <br><br>
                                <a href="{{ route('delete_document', ['doc_id'=>$document->doc_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                            $sl++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


