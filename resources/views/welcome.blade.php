@extends('frontend.master')
@section('frontmaster')


<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content text-center">
        <div class="container">
            <h1>{{ __('nav.higher education lecture management system') }}</h1>
            <p>{{ __('nav.An important idea in the definition of education is the notion of academic freedom') }}.</p>
            <div class="mt-4">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg fw-bold">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg fw-bold">{{ __('nav.login') }}</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg fw-bold ms-2">{{ __('nav.register') }}</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
</section>

<section class="container text-center my-5">
    <h2>{{ __('nav.About The Ministry of Higher Education') }}</h2>
    <p class=" fw-bold">{{ __('nav.The Ministry of Higher Education (MoHE) is a government entity responsible for overseeing and regulating the higher education system in various countries. The specific roles and responsibilities of the MoHE can vary depending on the country, but generally, it is responsible for Education.') }}</p>
    <a href="https://laravel.com/docs" class="btn btn-primary btn-lg">{{ __('nav.learn more') }}</a>
</section>

@endsection