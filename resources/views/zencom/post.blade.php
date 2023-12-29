@include('zencom.partials.header')
<title>Community</title>
<x-message />
<section class="custom-margin-x-10">
    <div class="container-fluid">
        <div class="row border-right">
            <div class="col-lg-3">

            </div>

            <div class="col-lg-6">
                <div class="d-flex flex-row justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="fs-3"><span class="highlight-green bold">{{ $users->name }}</span>/Feeds</div>
                    </div>
                    <div class="d-flex align-items-center p-2">

                    </div>
                    <div class="d-flex flex-column align-items-center p-2">
                        <div class="d-flex flex-row justify-content-end">
                            <div class="fs-5">
                                {{ \Carbon\Carbon::parse($users->created_at)->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @include('zencom.components.posts')

                @foreach ($comments as $comment)
                    <div class="card-custom-comment text-light mb-2">

                        <div class="d-flex flex-row justify-content-between">
                            <div class="p-2 d-flex flex-row align-items-center">
                                <div class="image-holder">
                                    @if ($comment->picture == null)
                                        <img src="{{ asset('css/assets/defaultpic.JPG') }}" class="rounded-circle">
                                    @else
                                        <img src="data:image/jpeg;base64,{{ base64_encode($comment->picture) }}"
                                            class="custom-image-size">
                                    @endif
                                </div>
                                <div class="d-flex flex-column  align-items-start px-2 mt-2">
                                    <div class="fs-6 px-3"><b> {{ $comment->name }}</b></div>

                                    <p class="fs-7 px-3">
                                        {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
                                </div>



                            </div>
                        </div>


                        <div class="card-body p-3">
                            <p class="card-text">
                                {{ $comment->comment }}
                            </p>
                        </div>
                    </div>
                @endforeach




            </div>

        </div>

    </div>

</section>











@include('zencom.components.footer')
