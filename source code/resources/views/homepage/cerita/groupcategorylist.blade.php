<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kategory Cerita</title>
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/bootstrap-icons.css') }}" rel="stylesheet">
    @vite(['resources/css/welcome.css', 'resources/css/style.css'])

</head>

<body>

@include('.homepage.common.header')

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <h2 class="my-2 mx-0 text-center">{!! $title !!}</h2>
            </div>
        </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Cerita Section ======= -->

    <section class="section my-5">
        <div class="container">
            <div class="row m-3">

                @forelse($categories as $category)

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="post-entry mx-4">
                            <a href="{{ route('cerita.by.category', ['selected' => $category->id]) }}">
                                <div class="card shadow text-black">
                                    <div class="card-body pt-4 text-center">
                                        <h2 class="h5 fw-bold">{{ $category->nama_kategori }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                @empty
                    <h1>empty</h1>
                @endforelse
            </div>

        </div>

    </section>
</main><!-- End #main -->
<script src="{{ asset('js/main.js') }}"></script>
@include('.homepage.common.footer')
</body>

</html>
