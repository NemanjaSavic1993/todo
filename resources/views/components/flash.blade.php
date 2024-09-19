<div class="container mt-3">
    @if(Session::get('updated'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{Session::get('updated')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::get('created'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('created')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::get('deleted'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{Session::get('deleted')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>