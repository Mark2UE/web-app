
@include('zencom.partials.header')

<title>Community</title>
<x-message />

<section class="custom-margin-10">
    <div class="row">
        <div class="col">
            <div class="fs-1">{{ auth()->user()->name }}'s Account</div>
            <hr>
        </div>
    </div>
    <div class="row mt-5">
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
<div class="modal fade" tabindex="-1" id="insertavatar" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5">
                <form action="/upload" method="POST" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h2 class="text-center mb-4">Update your Profile</h2>
                        <div class="col-lg-12">
                            <div class="mb-3 ">
                                @if (auth()->user()->picture)
                                    <img class="file-upload-image profile-picture-display"
                                        src="data:image/jpeg;base64,{{ base64_encode(auth()->user()->picture) }}"
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

<script>
    function readURL(input) {
        if (input.files && input.files[0]) { // if input is file, files has content
            var inputFileData = input.files[0]; // shortcut
            var reader = new FileReader(); // FileReader() : init
            reader.onload = function(e) {
                /* FileReader : set up ************** */
                console.log('e', e)
                $('.file-upload-placeholder').hide(); // call for action element : hide
                $('.file-upload-image').attr('src', e.target.result); // image element : set src data.
                $('.file-upload-preview').show(); // image element's container : show
                $('.image-title').html(inputFileData.name); // set image's title
            };
            console.log('input.files[0]', input.files[0])
            reader.readAsDataURL(inputFileData); // reads target inputFileData, launch `.onload` actions
        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        var $clone = $('.file-upload-input').val('').clone(true); // create empty clone
        $('.file-upload-input').replaceWith($clone); // reset input: replaced by empty clone
        $('.file-upload-placeholder').show(); // show placeholder
        $('.file-upload-preview').hide(); // hide preview
    }

    // Style when drag-over
    $('.file-upload-placeholder').bind('dragover', function() {
        $('.file-upload-placeholder').addClass('image-dropping');
    });
    $('.file-upload-placeholder').bind('dragleave', function() {
        $('.file-upload-placeholder').removeClass('image-dropping');
    });
</script>
@include('zencom.components.footer')


