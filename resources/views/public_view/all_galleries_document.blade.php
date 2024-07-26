@extends('public_view.layout.app')

@section('title')

Gallery

@endsection

@section('content')
  
<div class="site-section mt-5">
    <div class="col-md-8 container-fluid">
        <div class="row">
            
                <div class="row mx-auto">
                    @foreach ($all_galleries_document as $gallery)
                        <div class="col-md-5 mx-2 my-2 text-left text-light" style="background-color: #183661;">
                            <img height="200px" style="height: 200px !important;" src="{{ asset('storage/uploads/gallery/'.$gallery->document) }}" alt="Image" class="img-fluid" />
                            <h4>{{ $gallery->title }}</h4>
                            <p>{{ $gallery->description }}</p>
                        </div>
                    @endforeach
                    

                </div>

            </div>
            {{-- <div class="container mt-5 col-md-6">
                <div class="row">
                    <div class="col-md-10 mb-4">
                        <h3>Contact Me</h3>
                    </div>
                </div>
                <form action="{{ route('contact_message') }}" method="POST">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" class="form-control form-control-lg" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="eaddress">Email Address</label>
                            <input type="text" id="eaddress" name="email" class="form-control form-control-lg" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="message">Message</label>
                            <textarea name id="message" name="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <input type="submit" value="Send Message" class="btn btn-primary btn-lg px-5" />
                        </div>
                    </div>
                </form>
            </div> --}}
        </div>
    </div>
</div>


@endsection


