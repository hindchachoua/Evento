<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Evento</title>
    
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


    <link href="{{ asset('css/templatemo-festava-live.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    @include('layouts.navigation')
    <section class="pricing-section section-padding " style="background-color: #242424">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><a href="">Your events :</a></h3>
                        <p class="card-text">Total Events:{{ $eventsCount }}
                            
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><a href="">Reservations :</a></h3>
                        <p class="card-text">Total reservations: {{ $reservationsCount }}
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('layouts.footer')
    
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/click-scroll.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>