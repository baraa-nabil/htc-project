@extends('front.parent')

@section('title', 'Contact')

@section('style')
{{-- ajax --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@endsection

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contact
        <small>Subheading</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('homeWeb') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
            <!-- Contact Form -->

            <h3>Send us a Message</h3>
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Full Name:</label>
                        <input type="fullName" class="form-control" id="fullName" name="fullName" required
                            data-validation-required-message="Please enter your name.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Phone Number:</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" required
                            data-validation-required-message="Please enter your phone number.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            data-validation-required-message="Please enter your email address.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Message:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" name="message" required
                            data-validation-required-message="Please enter your message" maxlength="999"
                            style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="sendMessageButton" onclick="performStore()">Send
                    Message</button>
            </form>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
            <h3>Contact Details</h3>
            <p>
                3481 Melrose Place
                <br>Beverly Hills, CA 90210
                <br>
            </p>
            <p>
                <abbr title="Phone">P</abbr>: (123) 456-7890
            </p>
            <p>
                <abbr title="Email">E</abbr>:
                <a href="mailto:name@example.com">name@example.com
                </a>
            </p>
            <p>
                <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
            </p>
        </div>
    </div>
    <!-- /.row -->



    <!-- /.row -->

</div>
<!-- /.container -->


@endsection

@section('script')

<!-- Contact form JavaScript -->
<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<script src="{{ asset('front/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('front/js/contact_me.js') }}"></script>
{{-- Axios --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
{{-- Sweet Aleart --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- crud --}}
<script src="{{ asset('js/crud.js') }}"></script>
<script>
    function performStore(){
        let formData = new FormData();

        formData.append('fullName',document.getElementById('fullName').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('mobile',document.getElementById('mobile').value);
        formData.append('message',document.getElementById('message').value);


        store('/news/contact' , formData)


    }

</script>
@endsection