<div class="container-xl px-4 mt-n4">
    @if (session()->has('success'))
        <div class="alert alert-success alert-icon" role="alert">
            {{-- <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            <div class="alert-icon-aside">
                {{-- <i class="far fa-flag"></i> --}}
            </div>
            <div class="alert-icon-content">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-icon" role="alert">
            {{-- <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            <div class="alert-icon-aside">
                {{-- <i class="far fa-flag"></i> --}}
            </div>
            <div class="alert-icon-content">
                {{ session('error') }}
            </div>
        </div>
    @endif
    @if (session()->has('password_msg'))
        <div class="alert alert-danger alert-icon" role="alert">
            {{-- <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            <div class="alert-icon-aside">
                {{-- <i class="far fa-flag"></i> --}}
            </div>
            <div class="alert-icon-content">
                {{ session('password_msg') }}
            </div>
        </div>
    @endif
</div>

