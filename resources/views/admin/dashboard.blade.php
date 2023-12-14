@include('admin.admin-partials.header')

<div class="row">
    <div class="fs-1">
        Admin Setup

    </div>
    <hr>
    <div class="col-lg-4">
        <div class="card-custom">
            <div class="d-flex justify-content-center m-5 p-5">




                <div class="fs-5">
                    <center>
                        {{ $users }}
                        <br>
                        Users
                    </center>

                </div>
            </div>

            <a href="/admin/dashboard/users" class="btn btn-success form-control">User Page</a>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-custom">
            <div class="d-flex justify-content-center m-5 p-5">
                <div class="fs-5">
                    <center>
                        {{ $comments }}
                        <br>
                        Comments
                    </center>

                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-custom">
            <div class="d-flex justify-content-center m-5 p-5">
                <div class="fs-5">
                    <center>
                        {{ $posts }}
                        <br>
                        Posts
                    </center>

                </div>
            </div>
            <a href="/admin/dashboard/post" class="btn btn-warning form-control">Post Page</a>
        </div>
    </div>

</div>
<hr>

<section>

    <div class="row">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">

        </div>
    </div>

</section>
@include('admin.admin-partials.footer')
