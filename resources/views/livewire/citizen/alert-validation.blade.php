@if(session()->has('warning'))
<div class="container-xl my-2">
    <div class="alert alert-important alert-warning alert-dismissible" role="alert">
        <div class="d-flex">
            <div><span class="fa fa-exclamation-triangle fa-lg"></span> &nbsp;</div>
            <div>{{ session('warning') }}</div>
        </div>
        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
</div>
@endif
