
<nav class="navbar navbar-expand-lg nav-bg-custom  fixed-top" id="navbar">

    <div class="container-fluid">
        <div class="navbar-brand img ">
            <img src="{{ asset('css/assets/ORIG_PNG.png') }}" alt="">
        </div>

        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link hover_cst" aria-current="page" href="/"><b
                            class="bi bi-house purple">&nbsp;</b>Home&nbsp;&nbsp;</a>
                </li>


            </ul>
            <div class="d-flex" role="search">


                <button class="btn btn-success" id="toggle-sidebar"><span
                        class="spinner-grow spinner-grow-sm text-white"></span>&nbsp<b>{{ auth()->user()->name }}</b>
                </button>
            </div>
        </div>
    </div>
    <div class="sidebar sidebar-inside bg-dark">
        <button class="btn btn-success form-control" id="toggle-sidebar-inside"><i
                class="bi bi-arrow-bar-left"></i></button>
        <div class="sidebar-header">

            <div class="justify-content-center">

                <center>
                    <div class="row">

                        <div class="col-* hover-container">
                            <div class="d-flex justify-content-center mx-auto">
                                @if (auth()->user()->picture)
                            
                                    <a href="" data-bs-toggle="modal" data-bs-target="#insertavatar">
                                        
                                        <img class="file-upload-image profile-picture-display"
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

                            <span class="hover-icon">
                                <h1 class="bi bi-upload fa-3x text-white"></h1>
                                <b>Upload Image</b>
                            </span>
                        </div>

                        <div class="col-* m-1 p-1">
                            <label class="">
                                {{ auth()->user()->name }}
                            </label>
                            <br>
                            <label class="text-wrap">
                                {{ auth()->user()->email }}
                            </label>
                        </div>
                    </div>

                </center>
            </div>
        </div>
        <ul class="sidebar-list">
            <a href="/community">
                <li>
                    <div class="btn hover_cst"><b><i class="bi bi-people"></i>&nbsp;&nbsp;Community</b></div>
                </li>
            </a>
            <a href="/user">

                <li>
                    <div class="btn hover_cst"><b><i class="bi bi-person"></i>&nbsp;&nbsp;Account</b></div>
                </li>
            </a>
            <form action="/logout" method="POST">
                @csrf
                <li>
                    <button type="submit" class="btn hover_cst"> <b><i
                                class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;Logout</b></button>
                </li>
            </form>
        </ul>
    </div>
</nav>



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
