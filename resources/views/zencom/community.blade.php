@include('zencom.partials.header')
<title>Community</title>
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
                            <div class="fs-3"><span class="highlight-green bold">User</span>/Feeds</div>
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
                    <div class="card-custom text-light mb-3">
                        <div class="d-flex flex-row bg-header justify-content-between">
                            <div class="p-2 d-flex flex-row align-items-center">
                                <div class="image-holder">

                                    <img src="{{ asset('css/assets/defaultpic.JPG') }}" width="80"
                                        class="rounded-circle" height="70">

                                </div>

                                <div class="d-flex flex-column justify-content-center">
                                    <div class="fs-5 px-3"><b> Mark Manliclic</b></div>
                                    <p class="px-3">
                                        CEO-ADMIN</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center p-2">
                                <div class="p-1 d-flex flex-row justify-content-end">
                                    <h3 class="bi bi-pin-angle"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body  p-3">
                            <h5 class="card-title">Welcome to /Community.</h5>
                            <hr>
                            <p class="card-text">
                                1) <b class="highlight-green">Positive Engagement: </b>This is a space for positive
                                Postings and discussions.<br>

                                2) <b class="highlight-green">Respectful Language:</b> Avoid using vulgar words or
                                offensive language.<br>
                                3) <b class="highlight-green">Thoughtful Posting:</b> Take a moment to think before you
                                click and ensure your<br> contributions align with a constructive and respectful
                                community.
                            </p>

                            <span class="">Thank you for being a part of our /Community 🌟<span>
                                    <br>
                                    #<b id="delivery"></b>
                        </div>

                    </div>
                    <hr>

                    @foreach ($posts as $post)
                        <div class="card-custom text-light mb-5">

                            <div class="d-flex flex-row bg-header justify-content-between">
                                <a href="/community/users/{{ $post->author }}"
                                    class="p-2 d-flex flex-row align-items-center"
                                    style="text-decoration: none; color:white;">

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
                                </a>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-flex flex-row justify-content-end">

                                            @if ($post->author == auth()->user()->email)
                                                <a href="/community/profile/edit/{{ $post->id }}"
                                                    class="link-light btn btn-success">
                                                    <div class="fs-5"><i class="bi bi-pencil-square"></i></div>
                                                </a>
                                                <button class="link-light btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $post->id }}">
                                                    <div class="fs-5"><i class="bi bi-trash"></i></div>
                                                </button>
                                            @endif

                                            <a href="/community/view/{{ $post->id }}"
                                                class="link-light btn btn-success">
                                                <div class="fs-5"><i class="bi bi-eye"></i></div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="/community/view/{{ $post->id }}" style="text-decoration: none; color:white;">
                                <div class="card-body p-3">
                                    <div class="card-title d-flex flex-row justify-content-between">
                                        <div class="card-title d-flex flex-row justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-4"><b> {{ $post->title }}</b></div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>

                                    <p class="card-text">
                                        {{ $post->body }}
                                    </p>

                                </div>
                            </a>
                            <div class="button">
                                <button class="btn btn-success form-control" type="submit" data-bs-toggle="modal"
                                    data-bs-target="#commentform{{ $post->id }}">
                                    <i class="bi bi-chat-dots"></i>&nbsp;Comment
                                </button>
                            </div>

                        </div>

                        <div class="modal fade" tabindex="-1" role="dialog" id="delete{{ $post->id }}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirmation</h5>

                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this post?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <a href="/community/profile/delete/{{ $post->id }}"
                                            class="btn btn-danger" id="confirmDelete">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" tabindex="-1" id="commentform{{ $post->id }}"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="d-flex flex-column w-100">
                                    <div class="p-2">
                                        <h5 class="text-center">Replying to {{ $post->name }}</h5>
                                    </div>

                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div class="p-2 d-flex flex-row align-items-center">
                                                    <div class="image-holder">
                                                        @if ($post->picture == null)
                                                            <img src="{{ asset('css/assets/defaultpic.JPG') }}"
                                                                class="rounded-circle-custom">
                                                        @else
                                                            <img src="data:image/jpeg;base64,{{ base64_encode($post->picture) }}"
                                                                width="80" class="rounded-circle">
                                                        @endif
                                                    </div>
                                                    <h5 class="p-3">{{ $post->name }}</h5>
                                                </div>
                                            </div>
                                            <hr>

                                            <form action="/community/comment/{{ auth()->user()->id }}" method="POST"
                                                id="myForm">
                                                @csrf
                                                <input type="hidden" name="connected_to"
                                                    value="{{ $post->id }}">
                                                <input type="hidden" name="commented_to"
                                                    value="{{ $post->email }}">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12">

                                                        <div class="mb-3">
                                                            <label for="Body" class="form-label"><i
                                                                    class="bi bi-arrow-90deg-down"></i>&nbsp;Comment
                                                                Here:</label>
                                                            <div class="form-floating">
                                                                <textarea class="form-control loginform" id="floatingTextarea2" style="height: 100px" name="comment"
                                                                    maxlength="250"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="mt-5">
                                                            <button type="submit"
                                                                class="btn btn-success form-control" id="loading-btn"
                                                                onclick="submitForm()">
                                                                <span class="spinner-border spinner-border-sm d-none"
                                                                    role="status" aria-hidden="true"></span>
                                                                <i class="bi bi-chat-dots"></i>&nbsp;Comment</button>
                                                        </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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


<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container p-3 fixed-bottom">
        @if (isset($message['message']))
            <div class="toast show bottom-0 end-0 toast-custom">
                <div class="toast-header toast-custom">
                    <strong class="me-auto">Alert</strong>
                    <small class="">Just now</small>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body green">
                    {{ $message['message'] }}
                </div>
            </div>
        @endif
    </div>
</div>
@include('zencom.components.footer')
