<nav class="navbar navbar-dark bg-success navbar-expand-lg main-nav">
    <div class="container-fluid">
        <a href="/dashboard" class="navbar-brand">
            Dashboard {{ config('app.name') }}
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="dropdown-toggle"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav top ms-auto mb-2 mb-lg-0">
                @switch(Illuminate\Support\Facades\Auth::user()->tipe_akun)
                    @case(0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pengelolaan Sampah
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('sampah.home') }}">Data Sampah</a></li>
                                <li><a class="dropdown-item" href="{{ route('sampah.kategori.home') }}">Daftar Kategori Sampah</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cerita
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('cerita.list') }}">Daftar Cerita</a></li>
                                <li><a class="dropdown-item" href="{{ route('cerita.kategori.home') }}">Daftar Kategori Cerita</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('nasabah.list') }}" class="nav-link">Nasabah Anda</a>
                        </li>

                        @break
                    @case(1)
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/saldo">Riwayat Saldo Anda</a>
                        </li>

                    @break
                    @case(2)
                        <li class="nav-item">
                            <a href="{{ route('admin.homepage.update.form') }}" class="nav-link">Ubah Halaman Depan</a>
                        </li>
                    @break
                @endswitch
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link">Profil Anda</a>
                </li>
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
