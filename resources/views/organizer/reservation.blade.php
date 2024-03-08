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

    <div class="container text-center" style="width: 50%" >
        <h1 class="text-center mt-5 mb-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold">Reservations :</h1>
    
        @forelse ($bookings as $item)
            @if($item->isValid == 0)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Event Title: {{ $item->title }}</h5>
                        <p class="card-text">Event Description: {{ $item->description }}</p>
                        <p class="card-text">Event Date: {{ $item->date }}</p>
                        <p class="card-text">Validation: {{ $item->isValid }}</p>
                        <p class="card-text">Reserved by: {{ $item->user_name }}</p>
                        
                        <form action="{{ route('bookings.accept', ['booking' => $item->id]) }}" method="POST">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-success" style="background-color: #6a422f">Accept</button>
                        </form>
                    </div>
                </div>
            @endif
        @empty
            <div class="alert alert-danger" style="margin-top: 5%; margin-bottom: 5%;">
                <p>No Reservations</p>
            </div>
        @endforelse
    </div>
    

    @include('layouts.footer')
        
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>