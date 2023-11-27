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
                            class="bi bi-house purple">&nbsp;&nbsp;</b>Home&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover_cst" href="/teams"><b
                            class="bi bi-people orange">&nbsp;&nbsp;</b>Teams&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover_cst" href="/events"><b
                            class="bi bi-calendar green">&nbsp;&nbsp;</b>Events&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover_cst" href="/about"><b
                            class="bi bi-lightning-charge yellow">&nbsp;&nbsp;</b>About Zen&nbsp;&nbsp;</a>
                </li>

            </ul>

            <div class="d-flex" role="search">
                <button class="btn hover_cst" data-bs-toggle="modal" data-bs-target="#signupform"><b>
                        Sign-Up</b></button>
                <button class="btn hover_cst" data-bs-toggle="modal" data-bs-target="#loginform"> <b>Login</b></button>
            </div>

        </div>
    </div>
</nav>



<!-- Modal -->
<div class="modal fade" tabindex="-1" id="loginform" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="d-flex flex-column w-100">
            <div class="p-2 text-center">
                <div class="fs-3"><span class="highlight-green bold">Login</span>/User</div>
            </div>
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="/login" method="POST" id="myForm">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email </label>
                                    <div class="input-group">
                                        <span class="input-group-text loginform"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control loginform" autocomplete="off"
                                            id="email" name="email">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text loginform "><i class="bi bi-lock"></i></span>
                                        <input type="password" class="form-control loginform " autocomplete="off"
                                            id="password" name="password">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="{{ route('show.forgot') }}" style="text-decoration: none;color:#198754;">
                                        Forgot
                                        Password
                                    </a>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-success form-control" id="loading-btn"
                                        onclick="submitForm()">
                                        <span class="spinner-border spinner-border-sm d-none" role="status"
                                            aria-hidden="true"></span>
                                        Login</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>






<!-- Modal -->
<div class="modal fade" tabindex="-1" id="signupform" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="d-flex flex-column w-100">
            <div class="p-2 text-center">
                <div class="fs-3"><span class="highlight-green bold">Register</span>/User</div>
            </div>
            <div class="modal-content">
                <div class="modal-body m-5">
                    <form action="/store" method="POST" id="myForm1">
                        @csrf
                        <div class="row d-flex flex-row justify-content-center">
                            <div class="col-lg-6 flex-fill">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <div class="input-group">
                                        <span class="input-group-text loginform"><i class="bi bi-envelope"></i></span>
                                        <input type="email" class="form-control loginform" id="email_type"
                                            name="email" onkeyup="validateEmail();">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 flex-fill">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Username:</label>
                                    <div class="input-group">
                                        <span class="input-group-text loginform "><i
                                                class="bi bi-person-circle"></i></span>
                                        <input type="text" class="form-control loginform" id="name_type"
                                            name="name" maxlength="10" onkeyup="validateUser();">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 flex-fill">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text loginform"><i class="bi bi-lock"></i></span>
                                        <input type="password" class="form-control loginform" id="password_type"
                                            name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 flex-fill">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text loginform"><i class="bi bi-lock"></i></span>
                                        <input type="password" class="form-control loginform"
                                            id="password_confirmation" name="password_confirmation"
                                            onkeyup='check();'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('login/google') }}">Login with Google</a>

                        <div class="d-flex justify-content-center p-3">
                            <i class="red" id="message"></i>
                        </div>
                        <button type="submit" class="btn btn-success form-control" id="loading-btn1">
                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                            Register</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
