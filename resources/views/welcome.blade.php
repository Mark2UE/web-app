@include('partials.header')
<title>/C | Welcome</title>

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
{{-- <section class="section-parallax">
    <div class="text-white">
        <div class="custom-margin-10">


            <h1><b>What's Happening?</b></h1>
            <hr>

            <div class="row">
                <div class="col-lg-6">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>

                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('css/assets/newsfeed.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('css/assets/newsfeed2.jpg') }}" alt="" class="img-fluid">
                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


                </div>
                <div class="col-lg-6 card-custom p-3">

                    <div class="fs-1">
                        This one's for all the gamers out there! 🎮
                    </div>
                    <p>Recently, the Zenith Esports - UE Caloocan community was invited to Smart's Giga Arena Gamer Fest
                        at SM Megamall to witness the prowess and collaboration of mobile gaming and esports the country
                        has to offer!
                        Highlights of the event consisted of showstopping exhibitors from famous mobile games like MLBB,
                        CODM LOL WILDRIFT, POKEMON UNITE, PUBG MOBILE, and FARLIGHT 84!
                        Here's to more opportunities for the Zenith Community in the name of Esports! ⚡️
                        <br>
                        <br>
                        <b>#ZENITH2324</b> <br>
                        <b>#UnleashYourGamingProwess</b>
                    </p>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-6 p-3">
                    <div class="row g-0 card-custom  position-relative">
                        <div class="col-md-6 mb-md-0 p-md-4">
                            <img src="{{ asset('css/assets/newsfeedlol.jpg') }}" alt="" class="img-fluid w-100">
                        </div>
                        <div class="col-md-6 p-4 ps-md-0">
                            <h5 class="mt-0"> Congratulations to our UE Zen T1 League of Legends team who secures
                                their
                                spot in the top 05 out of 128 teams in the Empyrean Cup October Qualifiers. 🎮
                                To our dear players — John Edward Alfonso (Top Laner), Mikkolo Eiroc Barbeyto (Jungle),
                                Lloyd Ilagan (Mid Laner), John William Mendiola (AD Carry) and Ivan Joey Langreo
                                (Support),
                                you’ve unleash your prowess with full potential! To our UE Zen T2, you guys did great
                                also!
                                </p>

                        </div>
                    </div>


                </div>
                <div class="col-lg-6 p-3">
                    <div class="row g-0 card-custom  position-relative">
                        <div class="col-md-6 mb-md-0 p-md-4">
                            <img src="{{ asset('css/assets/ml.jpg') }}" alt="" class="img-fluid w-100">
                        </div>
                        <div class="col-md-6 p-4 ps-md-0">
                            <h5 class="mt-0"> TOTEM POLE WILL RISE IN EVERY CORNER ⚡️

                                We are thrilled to announce that our UE Zen - Mobile Legends Team will join the
                                Philippine
                                Collegiate Championship. Let us show them our support as they battle the biggest
                                collegiate
                                championship of the year!

                                Representing the Zenith Esports - University of the East Caloocan are:

                                Team Captain: Barts

                                Teammates:
                                VIXIII
                                Lu never galit hehe
                                Rez rez rez
                                Kang hyewon
                                Matasui
                                Hulya

                                Best of luck to our UE Zen! ✨⚡️</p>

                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>

</section> --}}

{{-- 
<section>
    <div class="custom-margin-10">

    </div>

</section>
 --}}

@include('partials.footer')
