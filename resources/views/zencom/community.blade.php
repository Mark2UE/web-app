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
                                        ADMIN</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center p-2">
                                <div class="p-1 d-flex flex-row justify-content-end">
                                    <h3 class="bi bi-pin-angle"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body  p-3">
                            <div class="fs-1 card-title">Welcome to Code Shelf.</div>
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

                            <span class="">Thank you for being a part of our Code Shelf Community🌟<span>
                                    <br>
                                    #Contribute
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
</section>


<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container p-3 fixed-bottom">
        @if (isset($message['message']))
            <div class="toast show bottom-0 end-0 toast-custom">
                <div class="toast-header toast-custom">
                    <strong class="me-auto">Alert</strong>
                    <small class="">Just now</small>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                        aria-div="Close"></button>
                </div>
                <div class="toast-body green">
                    {{ $message['message'] }}
                </div>
            </div>
        @endif
    </div>
</div>
@include('zencom.components.footer')
