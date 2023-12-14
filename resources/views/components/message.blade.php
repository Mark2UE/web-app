<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container p-3 fixed-bottom">
        @if (session()->has('message'))
            <div class="toast show bottom-0 end-0 toast-custom">
                <div class="toast-header toast-custom">
                    <strong class="me-auto">Alert</strong>
                    <small class="">Just now</small>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body orange-flow">
                    {{ session('message') }}


                </div>
            </div>
        @endif
        @if (session()->has('adminconfirm'))
            <div class="toast show bottom-0 end-0 toast-custom">
                <div class="toast-header toast-custom">
                    <strong class="me-auto">Alert</strong>
                    <small class="">Just now</small>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body orange-flow">
                    {{ session('adminconfirm') }} <br>
                    <a href="/admin/dashboard" class="btn btn-success">Go to Admin Dashboard</a>
                </div>
            </div>
        @endif
        @if (session()->has('messagegreen'))
            <div class="toast show bottom-0 end-0 toast-custom">
                <div class="toast-header toast-custom">
                    <strong class="me-auto">Alert</strong>
                    <small class="">Just now</small>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body green">
                    {{ session('messagegreen') }}
                </div>
            </div>
        @endif
        @error('email')
            <div class="toast-container p-3 fixed-bottom">
                <div class="toast show bottom-0 end-0 toast-custom">
                    <div class="toast-header toast-custom">
                        <strong class="me-auto">Alert</strong>
                        <small class="">Just now</small>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body orange-flow">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror

        @error('name')
            <div class="toast-container p-3 fixed-bottom">
                <div class="toast show bottom-0 end-0 toast-custom">
                    <div class="toast-header toast-custom">
                        <strong class="me-auto">Alert</strong>
                        <small class="">Just now</small>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body orange-flow">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror

        @error('password')
            <div class="toast-container p-3 fixed-bottom">
                <div class="toast show bottom-0 end-0 toast-custom">
                    <div class="toast-header toast-custom">
                        <strong class="me-auto">Alert</strong>
                        <small class="">Just now</small>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body orange-flow">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror

        @error('password_confirmation')
            <div class="toast-container p-3 fixed-bottom">
                <div class="toast show bottom-0 end-0 toast-custom">
                    <div class="toast-header toast-custom">
                        <strong class="me-auto">Alert</strong>
                        <small class="">Just now</small>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body orange-flow">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror

        @error('picture')
            <div class="toast-container p-3 fixed-bottom">
                <div class="toast show bottom-0 end-0 toast-custom">
                    <div class="toast-header toast-custom">
                        <strong class="me-auto">Alert</strong>
                        <small class="">Just now</small>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body orange-flow">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror

    </div>
</div>
