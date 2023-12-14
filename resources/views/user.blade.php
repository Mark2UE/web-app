@include('partials.header')
<title>User Page</title>
<div class="hero-new__background-image-user d-flex align-items-center">

    <div class="container-xxl">
        <div class="row m-5">
            <div class="col-lg-12 text-center p-5">

                <div class="fs-1">
                    <br>
                    <b>Profile Settings</b>
                </div>
            </div>

        </div>

    </div>
</div>
<section class="custom-margin-10">
    <div class="row">
        <div class="col">
            <div class="fs-1">{{ auth()->user()->name }}'s Profile</div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="hover-container">

                <div class="mx-auto">
                    @if (auth()->user()->picture)
                        <a href="" data-bs-toggle="modal" data-bs-target="#insertavatar">
                            <img class="profile-picture-display-settings"
                                src="data:image/jpeg;base64,{{ base64_encode(auth()->user()->picture) }}"
                                alt="User Picture">
                        </a>
                    @else
                        <a href="" data-bs-toggle="modal" data-bs-target="#insertavatar">
                            <img src="{{ asset('css/assets/defaultpic.JPG') }}" alt="User Picture"
                                class="profile-picture">
                        </a>
                    @endif
                </div>

                <span class="hover-icon d-flex justify-content-center mx-auto">
                    <div class="bi bi-upload fa-3x text-white"></div>
                    <b>Upload Image</b>
                </span>


            </div>

            <div class="btn btn-success form-control" data-bs-toggle="modal" data-bs-target="#insertavatar">Upload Image
            </div>

        </div>
        <div class="col-lg-9">
            <div class="card-custom p-5">
                <div class="fs-1 text-white p-1">
                    <b> Account Settings</b>
                </div>
                <hr>

                <div class="row d-flex flex-column">
                    <form action="/user/update" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                        <div class="col-lg-12">
                            <div class="input-group mb-4">
                                <span class="updateform">Username:</span>
                                <input type="text" class="form-control loginform" autocomplete="off" id="email"
                                    name="name" value="{{ auth()->user()->name }}" maxlength="10">
                            </div>
                            <div class="input-group mb-4">
                                <span class="updateform">Email:</span>
                                <input type="text" class="form-control loginform" autocomplete="off" id="email"
                                    name="email" value="{{ auth()->user()->email }}" disabled>

                            </div>
                            <div class="input-group mb-4">
                                <span class="updateform">Password:</span>
                                <input type="password" class="form-control loginform" autocomplete="off" id="email"
                                    name="password" value="{{ auth()->user()->password }}">

                            </div>

                            <div class="input-group mb-4">
                                <button type="submit" class="btn btn-success form-control" id="loading-btn1">
                                    <span class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="true"></span>
                                    Update</button>

                            </div>
                        </div>

                    </form>


                </div>

            </div>
        </div>

    </div>
</section>




@include('partials.footer')
