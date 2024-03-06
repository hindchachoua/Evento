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

<div class="container">
    <div class="text-center mb-5">
      <h3>All Events:</h3>
      <p class="lead">Book Your Event now</p>
    </div>
    
    @foreach ($events as $event)
    <div class="card mb-3" style="background-color: #ff7146">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 mb-2">Events</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">{{ $event->title}}</h4>
              <span class="badge bg-secondary">{{ $event->category->name}}</span> <span class="badge bg-success">{{ $event->date}}</span>
        
              <p>available_tickets: <span class="badge bg-secondary">{{ $event->available_tickets}}</span></p>
            </div>
            <div class="col-sm-4 py-2">
            </div>

            <form action="{{ route('user.reserve', $event->id)}}" method="POST">

                @csrf
                <input type="number" name="num_people" id="num_people">
                    <button type="submit" class="btn btn-primary">Buy Ticket</button>
            </form>
            
          </div>
        </div>
      </div>
      <span class="badge bg-secondary">{{ $event->description}}</span>
    </div>
    @endforeach
    
    
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