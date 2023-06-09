<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blog</title>
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/bootstrap-icons.css') }}" rel="stylesheet">
    @vite(['resource/css/welcome.css', 'resource/css/style.css'])

</head>

<body>

@include('.homepage.common.header')

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <h2 class="my-2 mx-0">{!! $title !!}</h2>
            </div>
        </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Blog Section ======= -->

    <section class="section my-5">
        <div class="container">
            <div class="mb-5">

                @forelse($units as $unit)
                    <div class="d-flex justify-content-center align-content-center col-12">
                        <div class="post-entry px-2 col-lg-6 col-md-10 col-sm-12">
                            <div class="post-text">
                                <h1 class="h2">{{ $unit->nama_unit }}</h1>
                                <br>
                                <ul style="list-style: none">
                                    <li>
                                        <h2 class="h5">alamat bank sampah</h2>
                                        <p>{{ $unit->alamat_unit }}</p>
                                    </li>
                                    <li>
                                        <h2 class="h5">kecamatan asal bank sampah</h2>
                                        <p>{{ $unit->kecamatan_unit }}</p>
                                    </li>
                                    <li class="pt-4">
                                        <p>
                                            <small>
                                                <i>lihat cerita mereka <a href="{{ route('blog.by.author', ['selected' => $unit->id]) }}">disini</a></i>
                                            </small>
                                        </p>
                                    </li>
                                </ul>
                                <hr class="mt-5">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="d-flex justify-content-center align-content-center col-12">
                        <div class="post-entry px-2 col-lg-6 col-md-10 col-sm-12">
                            <div class="post-text">
                                <h1>tidak ada</h1>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    {{ $units->links() }}
                </div>
            </div>

        </div>

    </section>
    @include('.homepage.common.footer')

</main><!-- End #main -->
<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
