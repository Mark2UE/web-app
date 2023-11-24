@include('zencom.partials.header')
<title>Zen | Community</title>
<x-message />
<section class="custom-margin-x-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>

            <div class="col-lg-6">
                <div class="p-1">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="fs-3"><span class="highlight-green">{{ $post->name }}</span>/Post</div>
                        </div>


                    </div>

                    <hr>
                    <div class="card-custom text-light mb-3">
                        <div class="d-flex flex-row bg-header justify-content-between">
                            <div class="p-2 d-flex flex-row align-items-center">
                                <div class="image-holder">
                                    @if ($post->picture == null)
                                        <img src="{{ asset('css/assets/defaultpic.JPG') }}" width="80"
                                            class="rounded-circle" height="70">
                                    @else
                                        <img src="data:image/jpeg;base64,{{ base64_encode($post->picture) }}"
                                            width="80" class="rounded-circle">
                                    @endif
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="fs-5 px-3"><b> {{ $post->name }}</b></div>
                                    <p class="px-3">
                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="card-body  p-3">
                            <h5 class="card-title"><b> {{ $post->title }}</b></h5>
                            <hr>
                            <p class="card-text">
                                {{ $post->body }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>














@include('zencom.components.footer')
