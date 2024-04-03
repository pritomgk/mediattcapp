@extends('public_view.layout.app')

@section('title')

Contact Us

@endsection

@section('content')
  
<div class="site-section mt-5">
    <div class="col-md-8 container-fluid">
        <div class="row">
            
            <div class="container mt-5 col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h3>Contact Info</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            24/7 you can get information about our activities. <br>
                            Feel free to contact me!
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <b>Location</b> <br>
                            PTI Road, Jigatola, Jamalpur, Bangladesh.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <b>Call Me</b><br>
                            <a href="tel:+8801711973520">+8801711973520</a><br> <a href="tel:+8801717834834">+8801717834834</a><br> <a href="tel:+8801944715158">+8801944715158</a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <b>Email</b><br>
                            <a href="mailto:mttijamalpur@gmail.com">mttijamalpur@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="container mt-5 col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h3>Contact Me</h3>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" class="form-control form-control-lg" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="eaddress">Email Address</label>
                            <input type="text" id="eaddress" class="form-control form-control-lg" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="tel">Tel. Number</label>
                            <input type="text" id="tel" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="message">Message</label>
                            <textarea name id="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <input type="submit" value="Send Message" class="btn btn-primary btn-lg px-5" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


