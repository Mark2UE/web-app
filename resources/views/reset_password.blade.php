@include('partials.header')
<title>Forgot Password</title>

<section class="zenBody d-flex justify-content-center" style="height:80vh;">

    <div class="container custom-margin-x-10  mb-5">
        <div class="fs-3"><span class="highlight-red bold">RESET</span>/password</div>
        <form action="" method="post">
            <div class="card-custom p-5">
                <div class="mb-3">
                    <label for="email" class="form-label fs-4">Your Email </label>
                    <div class="input-group ">
                        <span class="input-group-text loginform fs-4"><i class="bi bi-person"></i></span>
                        <input type="email" class="form-control loginform fs-4" autocomplete="off" id="email"
                            name="email" required>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-text loginform fs-4"><i class="bi bi-person"></i></span>
                        <input type="email" class="form-control loginform fs-4" autocomplete="off" id="email"
                            name="email" required>
                    </div>
                    
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-danger form-control" id="loading-btn">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Forgot Password</button>
                </div>
            </div>
        </form>
    </div>


</section>
<br><br>
@include('partials.footer')
