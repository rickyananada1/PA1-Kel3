<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ route('homepage') }}" class="logo d-flex align-items-center navbar-brand">
        <span>{{ \App\Models\Homepage::find('judul_website')->value }}</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('homepage') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('publicunitlist') }}">Daftar Bank Sampah</a></li>
          <li class="dropdown"><a href="{{ route('blog.all') }}"><span>Blog</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('blog.by.category') }}">Daftar Kategori Blog</a></li>
              <li><a href="{{ route('blog.by.author') }}">Daftar Penulis Blog</a></li>
              <li><a href="{{ route('blog.all') }}">Semua Blog</a></li>
            </ul>
          </li>
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Masuk</a></li>
          <li><a class="getstarted scrollto" href="{{ route('register') }}">Daftar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
