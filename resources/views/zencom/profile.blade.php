@include('zencom.partials.header')
<title>Zen | Community</title>
<x-message />
<section class="custom-margin-x-10">
    <div class="d-flex flex-row justify-content-center">
        <div class="text-start my-auto p-3">
            <div class="fs-1"> <b> {{ auth()->user()->name }}</b></div>
            <div class="fs-5 highlight-green">{{ auth()->user()->email }}</>
            </div>

        </div>
        <div class="p-2">
            @if (auth()->user()->picture == null)
                <img src="{{ asset('css/assets/defaultpic.JPG') }}" class="rounded-circle-custom">
            @else
                <img src="data:image/jpeg;base64,{{ base64_encode(auth()->user()->picture) }}"
                    class="rounded-circle-custom">
            @endif

        </div>
        <div class="p-2">

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
                            <div class="fs-3"><span class="highlight-green bold">Your</span>/Feeds</div>
                        </div>
                        <div class="d-flex align-items-center p-2">

                        </div>
                        <div class="d-flex flex-column align-items-center p-2">
                            <div class="d-flex flex-row justify-content-end">
                                <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#postform"><i class="bi bi-arrow-90deg-up"></i>&nbsp;Post</button>
                            </div>
                        </div>
                    </div>



                    <hr>
                    @foreach ($posts as $post)
                        <div class="card-custom text-light mb-5">
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
                                <div class="d-flex flex-column align-items-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-flex flex-row justify-content-end">
                                            <a href="/community/view/{{ $post->id }}"
                                                class="link-light btn btn-success">
                                                <div class="fs-5"><i class="bi bi-eye"></i></div>
                                            </a>
                                            <a href="/community/profile/delete/{{ $post->id }}"
                                                class="link-light btn btn-success">
                                                <div class="fs-5"><i class="bi bi-pencil-square"></i></div>
                                            </a>
                                            <a href="/community/profile/delete/{{ $post->id }}"
                                                class="link-light btn btn-success">
                                                <div class="fs-5"><i class="bi bi-trash"></i></div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body  p-3">
                                <div class="card-title d-flex flex-row justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-4"><b> {{ $post->title }}</b></div>
                                    </div>

                                </div>
                                <hr>
                                <p class="card-text">
                                    {{ $post->body }}
                                </p>

                            </div>
                            <div class="button">
                                <button class="btn btn-success form-control" type="submit" data-bs-toggle="modal"
                                    data-bs-target="#postform">
                                    <i class="bi bi-chat-dots"></i>&nbsp;Comment
                                </button>
                            </div>

                        </div>
                    @endforeach












                </div>


            </div>
            <div class="col-lg-3">

            </div>
        </div>
    </div>




</section>

















@include('zencom.components.footer')
