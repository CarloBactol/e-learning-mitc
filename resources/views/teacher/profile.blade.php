@extends('layouts.teacher')
@section('content')
@if (session('status'))
<div class="row">
    <div class="col-lg-6">
        <div class="alert alert-success" id="successAlert">
            <span class="text-white"> {{ session('status') }}</span>
        </div>
    </div>
</div>
@endif
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ asset('file/profile/'. Auth::user()->avatar) }}" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ Str::ucfirst(Auth::user()->firstname) . ' ' . str::ucfirst(Auth::user()->lastname)}}
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        {{ Auth::user()->role_as == '2' ? 'TEACHER' : '' }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"
                                        type="button">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                {{ Str::ucfirst(Auth::user()->bio) }} 
                            </p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                        Name:</strong> &nbsp; {{ Str::ucfirst(Auth::user()->firstname) . ' ' .
                                    str::ucfirst(Auth::user()->lastname)}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Mobile:</strong> &nbsp; {{ Auth::user()->phone }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Email:</strong> &nbsp; {{ Auth::user()->email }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Location:</strong> &nbsp; Philippines</li>

                            </ul>
                        </div>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Profile Information</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form id="updateForm" action="{{ route('teacher.update_profile', Auth::user()->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Modal body -->
                                <div class="modal-body">

                                    <div class="form-group mb-2">
                                        <input type="file" name="file" id="" class="form-control border px-3">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" value="{{str::ucfirst(Auth::user()->firstname)}}"
                                            pattern="[a-zA-Z]+" title="Letters only" name="firstname" id=""
                                            class="form-control border px-3 @error('firstname') is-invalid @enderror"
                                            placeholder="Your firstname">
                                        <small id="firstnameErr" class="text-danger"></small>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" value="{{ str::ucfirst(Auth::user()->lastname) }}"
                                            pattern="[a-zA-Z]+" title="Letters only" name="lastname" id=""
                                            class="form-control border px-3 @error('lastname') is-invalid @enderror"
                                            placeholder="Your lastname">
                                        <small id="lastnameErr" class="text-danger"></small>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="email" value="{{ Auth::user()->email }}" name="email" id=""
                                            class="form-control border px-3" placeholder="Your email">
                                        <small id="emailErr" class="text-danger"></small>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="phone" value="{{ Auth::user()->phone }}" name="phone" id=""
                                            pattern="[0-9]+" title="Digits only" class="form-control border px-3"
                                            placeholder="Your phone">
                                        <small id="phoneErr" class="text-danger"></small>
                                    </div>

                                    <div class="form-group mb-2">
                                        <textarea name="bio" placeholder="Bio" id="" cols="30" rows="5" @php $varBio;
                                            $varBio=trim(str::ucfirst(Auth::user()->bio))
                                        @endphp
                                            class="form-control border mb-2 px-3">&nbsp;{{ $varBio }}
                                            </textarea>
                                        <small id="bioErr" class="text-danger"></small>
                                    </div>
                                    <div class="form-group mb-2">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btnClose"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info btnSubmit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    document.getElementById('updateForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Perform client-side validation
        // var file = document.getElementsByName('file')[0].value;
        var firstname = document.getElementsByName('firstname')[0].value;
        var lastname = document.getElementsByName('lastname')[0].value;
        var email = document.getElementsByName('email')[0].value;
        var bio = document.getElementsByName('bio')[0].value;
        var phone = document.getElementsByName('phone')[0].value;


        var form = this;
        var icon = `<i class="fas fa-times"></i>`;

        // Add your validation logic here
        var isValid = true;
        if (firstname === '') {
            isValid = false;
            // Display error message for field1, e.g.:
            document.getElementById('firstnameErr').innerText = 'Firstname is required';
        }
        if (lastname === '') {
            isValid = false;
            // Display error message for field2, e.g.:
            document.getElementById('lastnameErr').innerText =  'Lastname is required';
        }
        if (email === '') {
            isValid = false;
            // Display error message for field2, e.g.:
            document.getElementById('emailErr').innerText =  'Email is required';
        }
        if (bio === '') {
            isValid = false;
            // Display error message for field2, e.g.:
            document.getElementById('bioErr').innerText =  'Bio is required';
        }

        if (phone.length != 11) {
            isValid = false;
            // Display error message for field2, e.g.:
            document.getElementById('phoneErr').innerText =  '11 digits required';
        }
        if (phone === '') {
            isValid = false;
            // Display error message for field2, e.g.:
            document.getElementById('phoneErr').innerText =  'Phone is required';
        }

        // If the form data is valid, submit the form
        if (isValid) {
            this.submit();
        }


    });

    // Reset the form when the modal is closed
    $('#myModal').on('hidden.bs.modal', function () {
        document.getElementById('updateForm').reset();
    });

      // clear the session
    $(document).ready(function () {
        $("#successAlert").show("slow").delay(3000).hide("slow");

    });
</script>

@endsection