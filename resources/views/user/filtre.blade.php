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

    <button class="btn" style="background-color:#ee5007; color: white" ><a href="{{ route('user.index') }}">Back-></a></button>

    <h1 style="font-size: 50px" class="text-center mt-5 mb-3">Result:</h1>



    @if ($events->isEmpty())

    <div class="card">
        <div class="card-body mt-5 mb-5">
            <p class="alert alert-info text-center">No Events added yet.</p>
        </div>
    </div>
    @else
    @foreach ($events as $event)
            <div class="col-lg-6 col-12 mt-4 mt-lg-0" style="margin-left: 25%; margin-bottom: 2%;" >
                <div class="pricing-thumb">
                    <div class="d-flex">
                        <div >
                            <h3 style="font-size: 28px; margin-top: -20px" >{{ $event->title}}</h3>

                            <p><span style="font-weight: bold">Category:</span> {{ $event->category->name}}</p>
                        </div>
                    </div>

                    <ul class="pricing-list mt-3">

                        <li class="pricing-list-item">{{ $event->description}}</li>
                        <span class="badge bg-success">{{ $event->date}}</span>
                        <p>available_tickets: <span class="badge bg-secondary">{{ $event->available_tickets}}</span></p>
                    </ul>
                    @if ($event->available_tickets == 0)
                    <p class="alert alert-danger" style="font-family: 'Times New Roman', Times, serif">No available tickets</p>
                                    
                    @else

                    <form action="{{ route('user.reserve', $event->id) }}" method="POST">
                      @csrf
                      <input type="number" name="num_people" id="num_people">
                      <input type="hidden" name="event_id" value="{{ $event->id }}">
                      <button type="submit" class="btn" style="background-color:#ee5007; color: white">Buy Ticket</button>
                  </form>
                  @endif
                </div>
            </div>
            @endforeach
    @endif

    @include('layouts.footer')
    
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>