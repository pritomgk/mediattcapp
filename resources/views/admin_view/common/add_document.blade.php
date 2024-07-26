@extends('admin_view.layouts.app')

@section('title')
  MediaTTC - Add Gallery Info
@endsection

@section('content')
<div class="site-section mt-5">
    <div class="container mt-5">
        <form action="{{ route('add_document_info') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group mb-4 mx-auto text-center">
                    <h3>Add Gallery Info</h3>
                </div>
            </div>
            @if (session()->has('error'))
              <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
            @endif
            @if (session()->has('success'))
              <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
            @endif
            {{-- <div class="row">
                <div class="col-md-6 form-group mt-5">
                    <b class="text-secondary"> The <span class="text-warning">*</span> given are mandatory!</b>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="title"><span class="text-warning">*</span> Title </label>
                    <input type="text" id="title" required name="title" class="form-control form-control-lg" />
                    @error('title')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="description"><span class="text-warning">*</span> Description </label>
                    <input type="text" id="description" name="description" class="form-control form-control-lg" />
                    @error('description')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="document"><span class="text-warning">*</span> Image </label>
                    <input type="file" id="document" required name="document" class="form-control form-control-lg" />
                    @error('document')
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
                    <input type="submit" value="Add Info" class="btn btn-primary btn-lg px-5" />
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


