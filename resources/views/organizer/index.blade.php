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
    <section class="schedule-section section-padding" id="section_4">
        <button style="color: rgb(255, 255, 255);"><a href="{{ route('organizer.user.index') }}">Add Event</a></button>
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">Event Schedule</h1>

                        <div class="table-responsive">
                            <table class="schedule-table table table-dark">
                                @foreach ($events as $event)
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>

                                        <th scope="col">{{ $event->date }}</th>
                                        <th>Actions</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $event->title }}</th>

                                        <td class="table-background-image-wrap pop-background-image">
                                            <h3>{{ $event->location }}</h3>

                                            <p class="mb-2">{{ $event->description }}</p>

                                            <p>{{ $event->available_tickets }}</p>

                                            <div class="section-overlay"></div>
                                        </td>
                                        <th><a href="">Edit</a>
                                            <a href="">Delete</a>
                                        </th>

                                       
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
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