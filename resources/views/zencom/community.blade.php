@include('zencom.partials.header')
<title>Zen | Community</title>

<section class="custom-margin-x-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>

            <div class="col-lg-6">
                <div class="p-1">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <h4><span class="highlight-green">User</span>/Feeds</h4>
                        </div>
                        <div class="d-flex flex-column align-items-center p-2">
                            <div class="d-flex flex-row justify-content-end">
                                <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Post</button>
                            </div>
                        </div>
                    </div>


                    <hr>


                    <div class="card-custom text-light mb-3">
                        <div class="d-flex flex-row bg-header justify-content-between">
                            <div class="p-2 d-flex flex-row align-items-center">
                                <div class="image-holder">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(auth()->user()->picture) }}"
                                        width="80" class="rounded-circle">
                                </div>

                                <h5 class="px-3">{{ auth()->user()->name }}</h5>
                            </div>
                            <div class="d-flex flex-column align-items-center p-2">
                                <div class="p-1 d-flex flex-row justify-content-end">
                                    {{ auth()->user()->created_at->format('F j, Y h:i A') }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body  p-3">
                            <h5 class="card-title">Title 123</h5>
                            <hr>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore amet sit tempora animi
                                ipsum exercitationem magnam? Cum, distinctio! At laudantium repellendus facilis
                                laboriosam placeat ipsa doloremque exercitationem doloribus id maxime?
                            </p>
                            <br>
                            <span class="highlight-green">#LoremIpsum<span>
                        </div>
                    </div>









                </div>


            </div>
            <div class="col-lg-3">

            </div>
        </div>
    </div>




</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@include('zencom.components.footer')
