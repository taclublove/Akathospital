<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://co-vaccine.moph.go.th/assets/images/moph-logo.gif" width="40px" height="40px"
                alt="">
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">
                        <i class="fas fa-bars me-1"></i>Menu
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex flex-row ms-auto me-3">
                {{-- <li class="nav-item me-3 me-lg-0 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-plus"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item me-3 me-lg-0 dropdown">
                    @if (auth()->user()->isAdmin() )
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="storage/images/{{ Auth::user()->image }}" class="rounded-circle"
                                height="40" width="40" alt="" loading="lazy" />
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="storage/images/users/{{ Auth::user()->image }}" class="rounded-circle"
                                height="40" width="40" alt="" loading="lazy" />
                        </a>
                    @endif

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            {{-- <a class="dropdown-item" href="#">Logout</a> --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
