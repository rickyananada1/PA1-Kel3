<html>
    <head>
        <title>Akun anda belum teraktivasi!</title>

        <!--- Bootstrap + Google Fonts --->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div style="height: 100vh; font-family: 'DM Sans', Arial, sans-serif!important;" class="d-flex justify-content-center align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-12 p-5 text-center">
                <div class="card shadow">
                    <div class="card-body m-4">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <h1 class="h2">akun anda belum akitf</h1>
                            <hr>
                            <p class="">
                                Mohon maaf, akun anda perlu diaktifkan terlebih dahulu
                                oleh administrator sistem sebelum anda dapat menggunakan
                                akun anda.
                            </p>
                            <div class="d-flex align-content-center justify-content-around col-12">
                                <form class="m-0" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>

                                <span>atau</span>

                                <a href="{{ route('dashboard') }}" class="btn btn-success"><small>
                                        periksa ke dashboard
                                    </small> </a>
                            </div>
                        @else
                            <h1 class="h2">;)</h1>
                            <hr>
                            <p class="">
                                wink wink
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
