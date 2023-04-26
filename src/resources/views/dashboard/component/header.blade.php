<nav class="navbar navbar-dark bg-success navbar-expand-lg main-nav">
    <div class="container">
        <div class="navbar-brand fw-semibold">
            Dashboard
        </div>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="dropdown-toggle"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                @switch(Illuminate\Support\Facades\Auth::user()->tipe_akun)
                    @case(0)
                        <li class="nav-item">
                            <a class="nav-link fw-bold" aria-current="page" href="#">Qute</a>
                        </li>

                    @break
                    @case(1)
                        <li class="nav-item">
                            <a class="nav-link fw-bold" aria-current="page" href="#">Qute2</a>
                        </li>

                    @break
                @endswitch
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
