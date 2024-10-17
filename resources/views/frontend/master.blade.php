<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SULTAN</title>
    <!-- locall styling -->
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <style>
        body {
            background-color: #1abc9c;
        }



        .hero-section {
            position: relative;
            background-image: url('https://img.lovepik.com/photo/48015/1418.jpg_wh860.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-section h1 {
            font-size: 4rem;
        }

        .hero-section p {
            font-size: 1.5rem;
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-green">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ __('nav.sultan') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">{{ __('nav.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('nav.about') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('nav.services') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('nav.contact') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('nav.language') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('locale', ['locale' => 'en']) }}">{{ __('nav.english') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', ['locale' => 'fa']) }}">{{ __('nav.farsi') }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>



@yield('frontmaster')




<footer class=" bg-dark text-white text-center py-3">
    <p>&copy; {{ date('Y') }} Hazrat. All rights reserved.</p>
</footer>


<!-- Bootstrap JS and dependencies -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>