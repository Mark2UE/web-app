@include('admin.admin-partials.header')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">

        </div>
        <div class="col-lg-6">
            <div class="card-custom p-5">
                <form action="/adminreg" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Admin Username:</label>
                        <div class="input-group">
                            <span class="input-group-text loginform "><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control loginform" id="name_type" name="username"
                                maxlength="10">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Admin Password:</label>
                        <div class="input-group">
                            <span class="input-group-text loginform"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control loginform" id="password_type" name="password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success form-control" id="loading-btn1">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Login </button>
                </form>
            </div>
        </div>


    </div>

</div>


















@include('admin.admin-partials.footer')
