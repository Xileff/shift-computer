<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3 text-success" href="/">CompuShifu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">All Components</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Rakitin</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2 rounded-4" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            @if (auth()->user())
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-fluid rounded-circle" width="40" src="{{ auth()->user()->picture }}"
                                alt="user_profile">
                        </a>
                        <ul class="dropdown-menu end-0 profile-temporary-style" aria-labelledby="userDropdown">
                            <li>
                                <p class="dropdown-item poppins fw-bold text-success text-center">
                                    {{ auth()->user()->username }}</p>
                            </li>
                            <div class="px-3">
                                <hr class="nav-divider m-0">
                            </div>
                            <li><a href="/profile" class="dropdown-item">Profile</a></li>
                            <form action="/logout" method="post">
                                @csrf
                                <li><button type="submit" class="dropdown-item text-danger">Log out</button></li>
                            </form>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mb-0">
                    <li class="nav-item my-2 mx-1">
                        <a class="btn btn-success rounded-4" aria-current="page" href="/login">Login</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
