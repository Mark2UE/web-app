@include('admin.admin-partials.header')
<title>User Page</title>

<section class="custom-margin-10">
    <div class="row">
        <div class="col">
            <div class="fs-1">{{ $userdata->name }}'s Profile</div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="hover-container">

                <div class="mx-auto">
                    @if ($userdata->picture)
                        <a href="" data-bs-toggle="modal" data-bs-target="#insertavatar">
                            <img class="profile-picture-display-settings"
                                src="data:image/jpeg;base64,{{ base64_encode($userdata->picture) }}" alt="User Picture">
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
                        <input type="hidden" name="id" value="{{ $userdata->id }}">
                        <div class="col-lg-12">
                            <div class="input-group mb-4">
                                <span class="updateform">Username:</span>
                                <input type="text" class="form-control loginform" autocomplete="off" id="email"
                                    name="name" value="{{ $userdata->name }}" maxlength="10">
                            </div>
                            <div class="input-group mb-4">
                                <span class="updateform">Email:</span>
                                <input type="text" class="form-control loginform" autocomplete="off" id="email"
                                    name="email" value="{{ $userdata->email }}" disabled>

                            </div>
                            <div class="input-group mb-4">
                                <span class="updateform">Password:</span>
                                <input type="password" class="form-control loginform" autocomplete="off" id="email"
                                    name="password" value="{{ $userdata->password }}">

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


<div class="modal fade" tabindex="-1" id="insertavatar" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5">
                <form action="/upload" method="POST" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h2 class="text-center mb-4">Update Profile</h2>
                        <div class="col-lg-12">
                            <div class="mb-3 ">
                                @if ($userdata->picture)
                                    <img class="file-upload-image profile-picture-display"
                                        src="data:image/jpeg;base64,{{ base64_encode($userdata->picture) }}"
                                        alt="User Picture">
                                @else
                                    <img src="{{ asset('css/assets/defaultpic.JPG') }}" alt="User Picture"
                                        class="file-upload-image profile-picture-display">
                                @endif
                            </div>
                            <div class="form-outline">
                                <div class="file-upload">
                                    <div class="file-upload-placeholder">
                                        <input class="file-upload-input" type='file' name="picture" id="image1"
                                            onchange="readURL(this);" accept="image/*" required />
                                        <button class="drag-text btn btn-success form-control">
                                            <i class="bi bi-upload"></i>
                                            Upload
                                        </button>
                                    </div>
                                    <div class="file-upload-preview">
                                        <div class="file-upload-remove">
                                            <button type="button" onclick="removeUpload()"
                                                class="btn btn-danger form-control">Remove </button>
                                        </div>
                                        <span class="image-title">Uploaded Image</span>
                                        <br><br>
                                        <button type="submit" class="btn btn-success form-control" id="loading-btn"
                                            onclick="submitForm()">
                                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                                aria-hidden="true"></span>
                                            Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@include('admin.admin-partials.footer')
