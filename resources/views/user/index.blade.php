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
    <div class="text-center mb-5 mt-5">
      <p class="alert alert-info">Book Your Event now :)</p>
    </div>

    <form action="{{ route('events.filtre') }}" method="POST">
      @csrf
      <label for="category" style="font-weight: bold">Category:</label>
      <select name="category" id="category">
          @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
      </select>

      <label for="search" style="font-weight: bold">Search by Title:</label>
    <input type="text" name="search" id="search">

      <button type="submit" class="btn" style="background-color:#ee5007; color: white">Filtre</button>
  </form>
    

  </div>

  <section class="pricing-section section-padding section-bg" id="section_5">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="text-center mb-5" style="font-size: 50px; margin-top: -50px">All Events:</h2>
            </div>
            
            @foreach ($events as $event)
            @if($event->isvalid == 1)
            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
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
            @else
            <p>No events found.</p>
            @endif
            @endforeach
            
            

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