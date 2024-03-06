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


    @foreach ($events as $event)
    <p>Event Title: {{ $event->title }}</p>
    <p>Event Description: {{ $event->description }}</p>
    <p>Event Date: {{ $event->date }}</p>
    <p>Status: {{ $event->status }}</p>
    <p>Reserved by: {{ $event->user_name }}</p>
    
    <form action="" method="POST">
    <button type="submit" class="btn btn-success" value="active">accepte</button>
    </form>
    <form action="" method="POST">
    <button type="submit" class="btn btn-danger" value="canceled">refuser</button>
    </form>
    <hr>
@endforeach
    @include('layouts.footer')
    
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>