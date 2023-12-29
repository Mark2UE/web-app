@include('zencom.partials.header')
<title>Community</title>
<x-message />
<section style="overflow-x:hidden;">


    <div class="d-flex justify-content-center" style="height: 100vh;">
        <div class="my-auto">
            @if ($user->picture == null)
                <img src="{{ asset('css/assets/defaultpic.JPG') }}" class="rounded-circle-custom-stalk">
            @else
                <img src="data:image/jpeg;base64,{{ base64_encode($user->picture) }}" class="rounded-circle-custom-stalk">
            @endif
        </div>
        <div class="text-start my-auto p-3">
            <p>//Welcome to {{ $user->name }}'s Space.</p>
            <div class="fs-1-stalk"> <b>{{ $user->name }} </b></div>
            <div class="fs-1-stalk highlight-green">{{ $user->email }}</div>
            <hr>
            <div class="fs-2-stalk">Interactions: {{ $interactions }}</div>
            <div class="fs-2-stalk">Contributions: {{ $contribute }}</div>
        </div>
    </div>

    <hr>
    <div class="container-fluid">
        <section class="custom-margin">

            <div class="row">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-6">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="fs-3"><span class="highlight-green bold">{{ $user->name }}</span>/Feeds
                            </div>
                        </div>
                    </div>
                    <hr>
                    @include('zencom.components.posts')
                </div>
                <div class="col-lg-3">

                </div>
            </div>

    </div>




</section>




</section>












@include('zencom.components.footer')
