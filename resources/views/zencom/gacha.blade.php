@include('zencom.partials.header')
<title>Gacha</title>
<x-message />
<section class="custom-margin-x-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>

            <div class="col-lg-6">
                <div class="p-1">
                  

                        <h2>Collections</h2>
                    <hr>
                   
                    <img src="{{ asset('css/assets/gachas/KENNETH.jpg') }}" alt="User Picture"
                    class="gachas">
                  
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
