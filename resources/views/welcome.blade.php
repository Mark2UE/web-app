@include('partials.header')
<title>Welcome</title>

<div class="hero-new__background-image d-flex align-items-center">

    <div class="container-xxl">
        <div class="row m-5">
            <div class="col-lg-6 text-start p-5">
                <b>Welcome to Community</b>
                <div class="fs-1">
                    Create <span id="delivery"></span>
                </div>
                <br>
                <p>Empower Your World: Contribute, Interact, Connect with Community. 🌐✨</p>
            </div>
            <div class="col-lg-6 p-5">
                @if (Auth::check())
                    <div class="text-end">
                        <br>
                        <div class="fs-1">Hello, {{ auth()->user()->name }}<br>
                        </div>
                        <p>What's on your mind?</p>

                    </div>
                @else
                    <div class="text-center">
                        <p>Sign-in using </p>
                        <a href="{{ url('login/google') }}" class="btn btn-outline-light form-control mb-2">
                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                            <i class="bi bi-google"></i>&nbsp;Google</a>

                        <a href="{{ url('login/github') }}" class="btn btn-outline-light form-control mb-2">
                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                            <i class="bi bi-github"></i>&nbsp;Github</a>

                    </div>

                    Create a Page for a celebrity, brand or business.
                @endif

            </div>

        </div>
    </div>

</div>


<section class="hero-new__background-image">

    <div class="container-xxl">
        <div class="fs-1">What is Community?</div>
        <hr>
        <div class="row my-5">
            <div class="col-lg-4">
                <div class="card-custom p-5 m-1">
                    <div class="fs-1">Interact</div>
                    <hr>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae esse rem dolor, similique
                        voluptates quae perferendis ea atque, incidunt maiores totam, doloremque ut optio. Veritatis
                        temporibus delectus quasi soluta praesentium.</p>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-custom p-5 m-1">
                    <div class="fs-1">Connect</div>
                    <hr>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae esse rem dolor, similique
                        voluptates quae perferendis ea atque, incidunt maiores totam, doloremque ut optio. Veritatis
                        temporibus delectus quasi soluta praesentium.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-custom p-5 m-1">
                    <div class="fs-1">Contribute</div>
                    <hr>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae esse rem dolor, similique
                        voluptates quae perferendis ea atque, incidunt maiores totam, doloremque ut optio. Veritatis
                        temporibus delectus quasi soluta praesentium.</p>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="fs-1">Why is Community?</div>
            <hr>
            <div class="col-lg-6">
                <div class="fs-5 p-5 m-1">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, tempora reprehenderit numquam
                    itaque quasi, illum officia quis libero possimus voluptatem saepe quibusdam quaerat optio. Quam
                    aperiam blanditiis laboriosam sit molestias!
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-custom p-5 m-1">
                    <div class="fs-1">Contribute</div>
                    <hr>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae esse rem dolor, similique
                        voluptates quae perferendis ea atque, incidunt maiores totam, doloremque ut optio. Veritatis
                        temporibus delectus quasi soluta praesentium.</p>
                </div>
            </div>
        </div>

        <hr>

        <div class="row mt-5">
            <div class="col-lg-6 px-5">
                <div class="fs-1">
                    <b> Lorem ipsum dolor</b>
                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda excepturi dicta consectetur
                    suscipit, labore, aliquam unde nisi distinctio, modi delectus pariatur atque fugiat exercitationem
                    eius! Praesentium accusantium rerum possimus non.</p>
            </div>


        </div>
    </div>

    <br><br><br>
</section>


<section class="hero-new__background-image">

</section>
@include('partials.footer')
