@php use App\Models\Unit; @endphp
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blog kami </title>
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
                <h2 class="my-2 mx-0">{!! $title !!}</h2>
            </div>
        </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Blog Section ======= -->

    <section class="section my-5">
        <div class="container">
            <div class="row mb-5">

                @forelse($blogs as $blog)

                    <div class="col-md-6 col-sm-12 col-lg-4 mb-5">
                        <div class="post-entry px-2">
                            <a href="{{ route('blog.view', ['id' => $blog->id]) }}" class="d-block mb-4">
                                <img src="{{ url('/images').'/'.$blog->image_header_url }}" alt="Image"
                                     class="img-fluid">
                            </a>

                            <div class="post-text">
                                <a href="{{ route('blog.view', ['id' => $blog->id]) }}"
                                   class="h5 fw-bold text-black">{{ $blog->judul_blog }}</a>
                                <span class="post-meta">oleh <span
                                        class="fw-normal text-black">{{ Unit::where('id', $blog->author)->first()->nama_unit }}</span> </span>
                                <p><small><a href="{{ route('blog.view', ['id' => $blog->id]) }}" class="readmore">Selengkapnya...</a></small>
                                </p>
                            </div>
                        </div>
                    </div>

                @empty
                    <div style="height: max-content" class="d-flex justify-content-center align-content-center">
                        miami
                    </div>
                @endforelse
            </div>

        </div>

    </section>
    @include('.homepage.common.footer')

</main><!-- End #main -->
<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
