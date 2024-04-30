@extends('public_view.layout.app')
@section('title')
    MediaTTC
@endsection
@section('content')

<div class="site-section">
    <div class="container">

        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline mb-3">
                    <span>All Courses</span>
                </h2>
                <p>Select course to see result. </p>
            </div>
        </div>

        <div class="row">

            @foreach ($view_courses as $view_course)
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                                <a href="{{ route('single_course', ['course_id' => $view_course->course_id]) }}"><img src="{{ asset('storage/uploads/courses/'.$view_course->content) }}" alt="Image" class="img-fluid"></a>
                        <div class="price">{{ $view_course->price }}</div>
                        {{-- <div class="category"><h3>Mobile Application</h3></div>   --}}
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>{{ $view_course->title }}</h2>
                        <div class="rating text-center mb-3">
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                        </div>
                        <p class="desc mb-4">{{ $view_course->tagline }}</p>
                        <p><a href="{{ route('institution_result', ['course_id' => $view_course->course_id]) }}" class="btn btn-primary rounded-0 px-4">See Result</a></p>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
</div>


@endsection


