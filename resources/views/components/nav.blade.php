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
                <div class="modal-body p-4">
                    <form action="/login" method="POST" id="myForm">
                        @csrf



                        <a href="{{ url('login/google') }}" class="btn btn-outline-success form-control mb-2">
                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                            <i class="bi bi-google"></i>&nbsp;Sign-in using Google</a>

                        <a href="{{ url('login/github') }}" class="btn btn-outline-success form-control mb-2">
                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                            <i class="bi bi-github"></i>&nbsp;Sign-in using github</a>
                        {{-- <a href="{{ url('login/facebook') }}"
                                        class="btn btn-outline-success form-control mb-2">
                                        <span class="spinner-border spinner-border-sm d-none" role="status"
                                            aria-hidden="true"></span>
                                        <i class="bi bi-github"></i>&nbsp;Sign-in using Facebook</a> --}}


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
