@include('admin.admin-partials.header')

<div class="d-flex flex-column w-100">
    <div class="p-2">
        <h5 class="text-center">Update post</h5>
        <center>
            Posted by: {{ $post->author }}
        </center>

    </div>


    <hr>
    <div class="container">

        <form action="/community/post/update/{{ $post->id }}" method="POST" id="myForm">
            @csrf
            <input type="hidden" name="id" value="{{ $post->id }}">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title </label>
                        <div class="input-group">
                            <input type="text" class="form-control loginform" autocomplete="off" id="title"
                                name="title" value="{{ $post->title }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Body" class="form-label">Body</label>
                        <div class="form-floating">
                            <textarea class="form-control loginform" id="floatingTextarea2" style="height: 100px" name="Body" maxlength="250">{{ $post->body }}</textarea>
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
@include('admin.admin-partials.footer')
