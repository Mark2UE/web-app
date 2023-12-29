<nav class="navbar navbar-expand-lg bg-header-nav fixed-top">
    <div class="container d-flex flex-row">

        <a class="navbar-brand" href="/community" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
            aria-label="Toggle navigation">
            <img src="{{ asset('css/assets/ORIG_PNG.png') }}" alt="" class="logoUp">
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mx-auto"> <!-- mx-auto will center the ul -->

                <li class="nav-item px-5 text-center"> <!-- Added text-center class to center the content -->
                    <a class="nav-link text-white" aria-current="page" href="/community/profile">
                        @if ($nav_bar == 'profile')
                            <div class="fs-2">
                                <i class="bi bi-person-fill green"></i>

                            </div>
                        @else
                            <i class="fs-2 bi bi-person"></i>
                        @endif
                    </a>
                </li>


                <li class="nav-item px-5 text-center">
                    <a class="nav-link text-white fs-2" href="/community">
                        @if ($nav_bar == 'community')
                            <i class="fs-2 bi bi-people-fill green"></i>
                        @else
                            <i class="fs-2 bi bi-people"></i>
                        @endif
                    </a>
                </li>
                <li class="nav-item px-5 text-center">
                    <a class="nav-link text-white " href="/">

                        <i class="fs-2 bi bi-search"></i>

                    </a>
                </li>
                <li class="nav-item px-5 text-center">
                    <a class="nav-link text-white " href="/">

                        <i class="fs-2 bi bi-arrow-return-right"></i>

                    </a>
                </li>

            </ul>
        </div>





        <div class="navbar-brand btn-group ">
            <div class="options_post" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fs-1 bi bi-list-nested"></i>
            </div>
            <ul class="dropdown-menu  dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">Account</a></li>
                <li><a class="dropdown-item" href="#">About</a></li>

                <li>
                    <hr class="hr-custom">
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item" href="">Logout</button>
                    </form>

                </li>
            </ul>
        </div>






    </div>
</nav>
