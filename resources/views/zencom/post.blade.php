@include('zencom.partials.header')
<title>Community</title>
<x-message />
<section class="custom-margin-x-10">
    <div class="container-fluid">
        <div class="row border-right">
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
                            <a href="/community/users/{{ $post->email }}"
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

                                        @if ($post->email == auth()->user()->email)
                                            <button aria-modal="#update{{ $post->id }}" data-bs-toggle="modal"
                                                data-bs-target="#update{{ $post->id }}"
                                                class="link-light btn btn-success">
                                                <div class="fs-5"><i class="bi bi-pencil-square"></i></div>
                                            </button>
                                            <button class="link-light btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $post->id }}">
                                                <div class="fs-5"><i class="bi bi-trash"></i></div>
                                            </button>




                                            <div class="modal fade" tabindex="-1" id="update{{ $post->id }}"
                                                aria-labelledby="uexampleModalLabel" aria-hidden="true">
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
                                                                        <h5 class="p-3">{{ auth()->user()->name }}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <form
                                                                    action="/community/comment/update/{{ $post->id }}"
                                                                    method="POST" id="myForm">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $post->id }}">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-md-12">
                                                                            <div class="mb-3">
                                                                                <label for="title"
                                                                                    class="form-label">Title </label>
                                                                                <div class="input-group">
                                                                                    <input type="text"
                                                                                        class="form-control loginform"
                                                                                        autocomplete="off"
                                                                                        id="title" name="title"
                                                                                        value="{{ $post->title }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="Body"
                                                                                    class="form-label">Body</label>
                                                                                <div class="form-floating">
                                                                                    <textarea class="form-control loginform" id="floatingTextarea2" style="height: 100px" name="Body" maxlength="250">{{ $post->body }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-5">
                                                                                <button type="submit"
                                                                                    class="btn btn-success form-control"
                                                                                    id="loading-btn"
                                                                                    onclick="submitForm()">
                                                                                    <span
                                                                                        class="spinner-border spinner-border-sm d-none"
                                                                                        role="status"
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


                                            <div class="modal fade" tabindex="-1" role="dialog"
                                                id="delete{{ $post->id }}">
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



















                                        @endif


                                    </div>
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

                        <div class="button">
                            <button class="btn btn-success form-control" type="submit" data-bs-toggle="modal"
                                data-bs-target="#commentform{{ $post->id }}">
                                <i class="bi bi-chat-dots"></i>&nbsp;Comment
                            </button>
                        </div>
                    </div>
                    <br> <br>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="fs-3"><span class="highlight-green">Interactions</span>/Comments</div>
                        </div>
                    </div>
                    <hr>

                    @foreach ($comments as $comment)
                        <div class="card-custom-comment text-light mb-2">
                            <div class="d-flex flex-row justify-content-between">
                                <div class="p-2 d-flex flex-row align-items-center">
                                    <div class="image-holder">
                                        @if ($comment->picture == null)
                                            <img src="{{ asset('css/assets/defaultpic.JPG') }}"
                                                class="rounded-circle">
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






<div class="modal fade" tabindex="-1" id="commentform{{ $post->id }}" aria-labelledby="exampleModalLabel"
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
                                    <label for="Body" class="form-label"><i
                                            class="bi bi-arrow-90deg-down"></i>&nbsp;Comment
                                        Here:</label>
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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>








@include('zencom.components.footer')
