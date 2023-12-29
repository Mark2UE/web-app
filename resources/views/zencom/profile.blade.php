@include('zencom.partials.header')
<title>Profile | {{ auth()->user()->name }}</title>
<x-message />
<section class="custom-margin-x-10">

    <div class="d-flex flex-row justify-content-center">
        <div class="my-auto p-3">
            @if (auth()->user()->picture == null)
                <img src="{{ asset('css/assets/defaultpic.JPG') }}" class="rounded-circle-custom">
            @else
                <img src="data:image/jpeg;base64,{{ base64_encode(auth()->user()->picture) }}"
                    class="rounded-circle-custom">
            @endif

        </div>

        <div class="text-start my-auto p-3">
            <div class="fs-1"> <b> {{ auth()->user()->name }}</b></div>
            <div class="fs-6 highlight-green">{{ auth()->user()->email }}</div>
            <hr>
            <div class="fs-6">Interactions: {{ $interactions }}</div>
            <div class="fs-6">Contributions: {{ $contribute }}</div>
        </div>



    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <div class="p-1">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="fs-3"><span class="highlight-green bold">Your</span>/Posts</div>
                        </div>
                        <div class="d-flex align-items-center p-2">

                        </div>
                        <div class="d-flex flex-column align-items-center p-2">
                            <div class="d-flex flex-row justify-content-end">
                                <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#postform"><i class="bi bi-plus-lg"></i>&nbsp;Post</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @include('zencom.components.posts')
                </div>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
    </div>


    <div class="footer" style="height:50vh;">

    </div>

</section>

















@include('zencom.components.footer')
