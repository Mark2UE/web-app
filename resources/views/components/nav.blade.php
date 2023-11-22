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
        <div class="modal-content">
            <div class="modal-body p-5">

                <form action="/login" method="POST" id="myForm">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h2 class="text-center mb-4">Login</h2>


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


                            <div class="mt-5">
                                <button type="submit" class="btn btn-success form-control" id="loading-btn"
                                    onclick="submitForm()">
                                    <span class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="true"></span>
                                    Login</button>
                            </div>

                </form>
            </div>
        </div>



    </div>


</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" id="signupform" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-body p-5">

                <form action="/store" method="POST" id="myForm1">
                    @csrf
                    <h2 class="text-center mb-4">Sign Up</h2>

                    <div class="row container-fluid">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>

                                @error('email')
                                    <i class="red">
                                        {{ $message }}
                                    </i>
                                @enderror
                                <div class="input-group">
                                    <span class="input-group-text loginform"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control loginform" autocomplete="off"
                                        id="email" name="email">

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Username/IGN:</label>

                                @error('name')
                                    <i class="red">
                                        {{ $message }}
                                    </i>
                                @enderror
                                <div class="input-group">
                                    <span class="input-group-text loginform "><i class="bi bi-controller"></i></span>
                                    <input type="text" class="form-control loginform " autocomplete="off"
                                        id="name" name="name">


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                @error('password')
                                    <i class="red">
                                        {{ $message }}
                                    </i>
                                @enderror
                                <div class="input-group">
                                    <span class="input-group-text loginform "><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control loginform " autocomplete="off"
                                        id="password" name="password">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                @error('password_confirmation')
                                    <i class="red">
                                        {{ $message }}
                                    </i>
                                @enderror
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text loginform "><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control loginform " autocomplete="off"
                                        id="password_confirmation" name="password_confirmation">
                                    <div class="invalid-feedback">
                                        Please enter a valid password.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success form-control" id="loading-btn1"
                            onclick="submitForm1()">
                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                            Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
