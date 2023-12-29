@forelse ($posts as $post)
    <div class="card-custom text-light mb-5">
        <!-- Example single danger button -->

        <div class="d-flex flex-row bg-header justify-content-between">
            <a href="/community/users/{{ $post->author }}" class="p-2 d-flex flex-row align-items-center"
                style="text-decoration: none; color:white;">

                <div class="image-holder">
                    @if ($post->picture == null)
                        <img src="{{ asset('css/assets/defaultpic.JPG') }}" width="80" class="rounded-circle"
                            height="70">
                    @else
                        <img src="data:image/jpeg;base64,{{ base64_encode($post->picture) }}" width="80"
                            class="rounded-circle">
                    @endif
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <div class="fs-5 px-3"><b> {{ $post->name }}</b></div>
                    <p class="px-3 ">
                        <i class="bi bi-globe-central-south-asia"></i> ·
                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                    </p>
                </div>
            </a>

            <div class="d-flex flex-column align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <div class="d-flex flex-row justify-content-end">

                        @if ($post->author == auth()->user()->email)
                            <div class="btn-group">
                                <div class="fs-5 options_post" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-dark border-1">
                                    <li class="btn-custom text-white" aria-modal="#update{{ $post->id }}"
                                        data-bs-toggle="modal" data-bs-target="#update{{ $post->id }}">
                                        <i class="bi bi-pencil-square"></i>&nbsp;Update

                                    </li>
                                    <hr class="hr-custom">
                                    <li class="btn-custom  text-white" aria-modal="#delete{{ $post->id }}"
                                        data-bs-toggle="modal" data-bs-target="#delete{{ $post->id }}">


                                        <i class="bi bi-trash"></i>&nbsp;Delete

                                    </li>

                                </ul>
                            </div>
                            {{-- <button aria-modal="#update{{ $post->id }}" data-bs-toggle="modal"
                            data-bs-target="#update{{ $post->id }}"
                            class="link-light btn btn-success">
                            <div class="fs-5"><i class="bi bi-pencil-square"></i></div>
                        </button>
                        <button class="link-light btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $post->id }}">
                            <div class="fs-5"><i class="bi bi-trash"></i></div>
                        </button> --}}
                        @endif
                        {{-- 
                    <a href="/community/view/{{ $post->id }}"
                        class="link-light btn btn-success">
                        <div class="fs-5"><i class="bi bi-eye"></i></div>
                    </a> --}}

                    </div>
                </div>

            </div>

        </div>

        <a href="/community/view/{{ $post->id }}" style="text-decoration: none; color:white;">
            <div class="card-body p-3">
                <div class="card-title d-flex flex-row justify-content-between">
                    <div class="card-title d-flex flex-row justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="fs-1"><b> {{ $post->title }}</b></div>

                        </div>

                    </div>

                </div>
                <div class="hr-custom">

                </div>

                <p class="card-text">
                    {!! $post->body !!}
                </p>
                <div class="text-end">
                    <i>by {{ $post->author }}</i>
                </div>

            </div>
        </a>
        {{-- <div class="button">
            <button class="btn btn-success form-control" type="submit" data-bs-toggle="modal"
                data-bs-target="#commentform{{ $post->id }}">
                <i class="bi bi-chat-dots"></i>&nbsp;Comment
            </button>
        </div> --}}
        <hr class="hr-custom">
        <div class="d-flex justify-content-center">
            <div class="vr"></div>
            <p class="px-5 pt-3 hover-buttons">
                <i class="bi bi-heart"></i>
            </p>
            <div class="vr"></div>
            <p class="px-5 pt-3 hover-buttons" data-bs-toggle="modal" data-bs-target="#commentform{{ $post->id }}">
                <i class="bi bi-chat-dots"></i>
            </p>
            <div class="vr"></div>
            <p class="px-5 pt-3 hover-buttons">
                <i class="bi bi-share"></i>
            </p>
            <div class="vr"></div>
        </div>





    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="delete{{ $post->id }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="d-flex flex-column w-100">
                <div class="p-2">
                    <h5 class="text-center">Delete Confirmation?</h5>
                </div>
                <div class="modal-content">
                    <div class="modal-body center">
                        <center>
                            Are you sure you want to delete this post?
                        </center>

                    </div>
                    <hr class="hr-custom">
                    <div class="d-flex justify-content-center">

                        <button type="button" class="text-white btn form-control"
                            data-bs-dismiss="modal">Close</button>

                        <div class="vr"></div>

                        <a href="/community/profile/delete/{{ $post->id }}" class="text-white btn form-control"
                            id="confirmDelete">Delete</a>

                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" tabindex="-1" id="commentform{{ $post->id }}" aria-divledby="exampleModaldiv"
        aria-hidden="true">
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

                        <form action="/community/comment/{{ auth()->user()->id }}" method="POST" id="myForm">
                            @csrf
                            <input type="hidden" name="connected_to" value="{{ $post->id }}">
                            <input type="hidden" name="commented_to" value="{{ $post->email }}">
                            <div class="row justify-content-center">
                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <div><i class="bi bi-arrow-90deg-down"></i>&nbsp;Comment
                                            Here:</div>
                                        <div class="form-floating">
                                            <textarea class="form-control loginform" id="floatingTextarea2" style="height: 100px" name="comment"
                                                maxlength="250"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-success form-control" id="loading-btn"
                                            onclick="submitForm()">
                                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                                aria-hidden="true"></span>
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



    <div class="modal fade" tabindex="-1" id="update{{ $post->id }}" aria-divledby="uexampleModaldiv"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="d-flex flex-column w-100">
                <div class="p-2">
                    <h5 class="text-center">Update post</h5>
                </div>
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="p-2 d-flex flex-row align-items-center">
                                <div class="image-holder">
                                    @if (auth()->user()->picture == null)
                                        <img src="{{ asset('css/assets/defaultpic.JPG') }}"
                                            class="rounded-circle-custom">
                                    @else
                                        <img src="data:image/jpeg;base64,{{ base64_encode(auth()->user()->picture) }}"
                                            class="rounded-circle-custom">
                                    @endif
                                </div>
                                <h5 class="p-3">{{ auth()->user()->name }}</h5>
                            </div>
                        </div>
                        <hr>
                        <form action="/community/comment/update/{{ $post->id }}" method="POST" id="myForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div>Title </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control loginform" autocomplete="off"
                                                id="title" name="title" value="{{ $post->title }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div>Body</div>
                                        <div class="form-floating">
                                            <textarea class="form-control loginform" id="floatingTextarea2" style="height: 100px" name="Body"
                                                maxlength="250">{{ $post->body }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-success form-control" id="loading-btn"
                                            onclick="submitForm()">
                                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                                aria-hidden="true"></span>
                                            Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@empty
    <div class="fs-1">haven't posted anything.</div>
@endforelse
