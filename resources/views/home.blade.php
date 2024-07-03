@extends('layouts.app')

@section('title', 'CinéMania88 - Accueil')

@section('content')
    <div class="logoContainer">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
    </div>

    <div class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('images/Accueil1_cinemania88_3.jpg') }}');"></div>
            <div class="carousel-item" style="background-image: url('{{ asset('images/Accueil1_cinemania88_4.jpg') }}');"></div>
            <div class="carousel-item" style="background-image: url('{{ asset('images/Accueil1_cinemania88_5.jpg') }}');"></div>
            <div class="carousel-item" style="background-image: url('{{ asset('images/Accueil1_cinemania88_6.jpg') }}');"></div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
        <div class="carousel-indicators">
            <span class="indicator active" data-slide-to="0"></span>
            <span class="indicator" data-slide-to="1"></span>
            <span class="indicator" data-slide-to="2"></span>
            <span class="indicator" data-slide-to="3"></span>
        </div>
    </div>

    <section class="categories">
        <h2>Catégories</h2>
        <div id="carouselAccordeon" class="container">
            @foreach($categories as $index => $category)
                <div class="bloc {{ $index === 0 ? 'active2' : '' }}" data-category-id="{{ $category->id }}">
                    <div class="bloc-haut">
                        <p class="titre-section">{{ strtoupper($category->name) }}</p>
                        <div class="ligne"></div>
                    </div>
                    <div class="contenu">
                        <img src="{{ asset('images/' . strtolower($category->name) . '.webp') }}" alt="Image {{ $category->name }}">
                        <div class="infos">
                            <h2>{{ $category->name }}</h2>
                            <p>{{ $category->description }}</p>
                            <button onclick="window.location.href='{{ route('categories.show', $category) }}'">Voir les produits</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        document.addEventListener('scroll', function() {
            const logo = document.querySelector('.logo');
            const scrollPosition = window.scrollY;
            const viewportHeight = window.innerHeight;
            const triggerPoint = viewportHeight * 0.50;

            if (scrollPosition > triggerPoint) {
                logo.style.opacity = '0';
            } else {
                logo.style.opacity = '1';
            }
        });
    </script>


    <script src="{{ asset('js/home.js') }}"></script>
@endsection



