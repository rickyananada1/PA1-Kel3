<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

{{--  <title>{{ $jw }}</title>--}}
  <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/bootstrap-icons.css') }}" rel="stylesheet">

    @vite('resources/css/welcome.css')
</head>

<body>
@include('.homepage.common.header')

  <section id="hero" class="hero d-flex align-items-center" style="
              background-image: linear-gradient(to left, rgba(245, 246, 252, 0), var(--bs-green) 30%), url('/homepage/{{ $head['background-image'] }}');
        ">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1>{{ $head['title'] }}</h1>
          <h2>{{ $head['subtitle'] }}</h2>
          <div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <main id="main">

    <section id="about" class="about">

      <div class="container">
        <div class="row gx-0">

            <div class="col-lg-6 d-flex align-items-center d-flex justify-content-center">
                <img src="/homepage/{{ $contenta['picture'] }}" class="img-fluid col-6 py-5" alt="">
            </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <div class="content">
              <h3>{{ $contenta['minititle'] }}</h3>
              <h2>{{ $contenta['title'] }}</h2>
              <p>
                {{ $contenta['content'] }}
              </p>
            </div>
          </div>

        </div>
      </div>

    </section>

    <section id="values" class="values">

      <div class="container">

        <header class="section-header">
          <h2>{{ $contentb['minititle'] }}</h2>
          <p> {{ $contentb['title'] }} </p>
        </header>

        <div class="row justify-content-center">

            @forelse($contentb['cards'] as $kards)
                <div class="col-lg-4 mt-lg-0">
                    <div class="box">
                        <img src="/homepage/{{ $kards['pict'] }}" class="img-fluid" alt="">
                        <h3>{{ $kards['title'] }}</h3>
                        <p>{{ $kards['content'] }}</p>
                    </div>
                </div>
            @empty
                <div class="col-lg-4 mt-lg-0">
                    <div class="box">
                        <img src="/homepage/{{ '.' }}" class="img-fluid" alt="">
                        <h3>{{ 'empty!' }}</h3>
                        <p>{{ 'empty!' }}</p>
                    </div>
                </div>
            @endforelse

        </div>

      </div>

    </section>

    <section id="features" class="features">

      <div class="container">

        <header class="section-header">
          <p>{{ $contentc['title'] }}</p>
        </header>

        <div class="row">

          <div class="">
            <div class="row align-self-center gy-4">

                @forelse($contentc['content'] as $itemkonten)
                    <div class="col-md-6">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>{{ $itemkonten }}</h3>
                        </div>
                    </div>
                @empty
                    <div class="col-md-6">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>{{ 'kosong' }}</h3>
                        </div>
                    </div>
                @endforelse

            </div>
          </div>

        </div>

          </div>

        </div>
      </div>

      </div>

    </section>

    <section id="services" class="services sections-bg">
      <div class="container">

        <div class="section-header">
          <p>{{ $contentd['title'] }}</p>
        </div>

        <div class="row gy-4">

            @forelse($contentd['cards'] as $kards)
                <div class="col-lg-4 col-md-6">
                    <div class="service-item  position-relative">
                        <h3>{{ $kards['title'] }}</h3>
                        <p>{{ $kards['content'] }}</p>
                    </div>
                </div>
            @empty
                <div class="col-lg-4 col-md-6">
                    <div class="service-item  position-relative">
                        <h3>{{ 'kosong' }}</h3>
                        <p>{{ 'kosong' }}</p>
                    </div>
                </div>
            @endforelse

        </div>

      </div>
    </section>

    <section>
        <div class="container">
            <div class="section-header">
              <p>{{ $cerita_section_title }}</p>
            </div>

            <div class="row text-center">
                <div class="row align-self-center gy-4 text-center d-flex justify-content-center">

                    @forelse($currentCerita as $Cerita)
                        <div class="col-lg-4 col-md-6 col-sm-12" align="center">
                            <a href="{{ route('cerita.view', ['id' => $Cerita->id]) }}" target="_blank" class="mx-3 my-5 card cerita-item shadow">
                                <img class="card-img front-cerita-cases" src="/images/{{ $Cerita->image_header_url }}">
                                <div class="card-body">
                                    <h3 class="h4 fw-bolder">{{ $Cerita->judul_cerita }}</h3>
                                    <p>
                                        <small class="font-italic mt-4"><i>oleh</i> <b>{{ \App\Models\Unit::where('id', $Cerita->author)->first()->nama_unit }}</b> <i>dalam</i> <b>{{ \App\Models\KategoriCerita::where('id', $Cerita->kategori)->first()->nama_kategori }}</b></small>
                                    </p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <a href="#" class="card cerita-item shadow" style="color:black">
                                <div class="card-body">
                                    <h3 class="h4 fw-bolder">kami belum memiliki cerita</h3>
                                    <p>
                                        Mohon menunggu, akan datang di masa depan!
                                    </p>
                                </div>
                            </a>
                        </div>

                    @endforelse
                </div>

            </div>
            </div>
    </section>

  </main>

@include('.homepage.common.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
