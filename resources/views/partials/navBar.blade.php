    {{-- partials/navBar --}}
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">K<span>MS</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index')}} ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('home.about') }} ">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-login">
                        <a href="{{ route('home.login')}} ">
                            <i class="fas fa-sign-in-alt me-2"></i>Login</a>
                    </button>

                    {{-- <button class="btn btn-login">
                        <a href="{{ route('home.register')}} ">
                            <i class="fas fa-sign-in-alt me-2"></i>Register</a>
                    </button> --}}
                </div>
            </div>
        </div>
    </nav>