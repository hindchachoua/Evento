<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
    
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
        <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    
        <link href="{{ asset('css/templatemo-festava-live.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body  class="antialiased">
        {{-- <div class="min-h-screen bg-gray-100 dark:bg-gray-900"> --}}
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}


            <section class="hero-section" id="section_1">
                <div class="section-overlay"></div>
    
                <div class="container d-flex justify-content-center align-items-center">
                    <div class="row">
    
                        <div class="col-12 mt-auto mb-5 text-center">
                            <small>Evento Live Presents</small>
    
                            <h1 class="text-white mb-5" style="font-weight: 900;font-size: 80px;">Welcome to our site</h1>
    
                            <a class="btn custom-btn smoothscroll" >Let's begin</a>
                        </div>
    
                        <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                            <div class="date-wrap">
                                <h5 class="text-white">
                                    <i class="custom-icon bi-clock me-2"></i>
                                    10 - 12<sup>th</sup>, Dec 2023
                                </h5>
                            </div>
    
                            <div class="location-wrap mx-auto py-3 py-lg-0">
                                <h5 class="text-white">
                                    <i class="custom-icon bi-geo-alt me-2"></i>
                                    National Center, United States
                                </h5>
                            </div>
    
                            <div class="social-share">
                                <ul class="social-icon d-flex align-items-center justify-content-center">
                                    <span class="text-white me-3">Share:</span>
    
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link">
                                            <span class="bi-facebook"></span>
                                        </a>
                                    </li>
    
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link">
                                            <span class="bi-twitter"></span>
                                        </a>
                                    </li>
    
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link">
                                            <span class="bi-instagram"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="{{ asset('storage/pexels-2022395.mp4') }}" type="video/mp4">
    
                        Your browser does not support the video tag.
                    </video>
                </div>
            </section>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
