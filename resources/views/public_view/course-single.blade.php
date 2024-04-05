@extends('public_view.layout.app')
@section('title')
  
@endsection
@section('content')
  
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">{{ $single_course->title }}</h2>
              <p>{{ $single_course->tagline }}</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="{{ route('all_courses') }}">Courses</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Course Details</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <p>
                        <img src="{{ asset('storage/uploads/courses/'.$single_course->content) }}" alt="Image" class="img-fluid">
                    </p>
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                        <h2 class="section-title-underline mb-5">
                            <span>Course Details</span>
                        </h2>
                        
                        <p><strong class="text-black d-block">Teacher:</strong> {{ $single_course->teacher_name }}</p>
                        <p class="mb-5"><strong class="text-black d-block">Hours:</strong> <input type="time" value="{{ $single_course->start_time }}" disabled>  &mdash; <input type="time" value="{{ $single_course->end_time }}" disabled></p>
                        <p>{{ $single_course->description }}</p>
                        {{-- <p>Modi sit dolor repellat esse! Sed necessitatibus itaque libero odit placeat nesciunt, voluptatum totam facere.</p> --}}
    
                        {{-- <ul class="ul-check primary list-unstyled mb-5">
                            <li>Lorem ipsum dolor sit amet consectetur</li>
                            <li>consectetur adipisicing  </li>
                            <li>Sit dolor repellat esse</li>
                            <li>Necessitatibus</li>
                            <li>Sed necessitatibus itaque </li>
                        </ul> --}}

                        <p>
                            <a href="#" class="btn btn-primary rounded-0 btn-lg px-5">Contact For Enroll</a>
                        </p>
    
                    </div>
            </div>
        </div>
    </div>



@endsection


