@vite(['resources/css/component/header.css'])
<?php
$HomePageData = \App\Models\Homepage::where('id', 'judul_website')->first()->value
?>
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('homepage') }}" class="logo d-flex align-items-center navbar-brand">
            <span>{{ $HomePageData }}</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('homepage') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ route('publicunitlist') }}">Daftar Bank Sampah</a></li>
                <li class="dropdown"><a href="{{ route('cerita.all') }}"><span>Cerita</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('cerita.by.category') }}">Daftar Kategori Cerita</a></li>
                        <li><a href="{{ route('cerita.by.author') }}">Daftar Penulis Cerita</a></li>
                        <li><a href="{{ route('cerita.all') }}">Semua Cerita</a></li>
                    </ul>
                </li>
                <li><a class="getstarted scrollto" href="{{ route('login') }}">Masuk</a></li>
                <li><a class="getstarted scrollto" href="{{ route('register') }}">Daftar</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>
