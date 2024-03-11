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

    <h1 class="text-center mt-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold;font-family: 'Times New Roman', Times, serif">Your Reservation:</h1>

    <div class="container " style="justify-content: space-between; display: flex; flex-wrap: wrap;">
        @if ($bookings->isEmpty())
            <div class="alert alert-info text-center mt-5 mb-5 p-5 shadow bg-white rounded col-lg-8 col-16 ml-auto mr-auto">
                <p class="alert alert-info" >No bookings added yet.</p>
            </div>
            
        @endif
        @foreach ($bookings as $booking)
    
        @if($booking->status == 'active')
        <div class="card-group">
        <div class="card mb-3 mt-5 p-5 text-center shadow bg-white rounded md bg-white p-6 rounded-md shadow-md dark:bg-gray-800 dark:border-gray-700 ">
          
          <div class="card-body" style="font-size: 20px">
                {{ $booking->title }} 
            </p>
            <p class="card-text" style="font-family: 'Times New Roman', Times, serif">
              Your Name:  {{ Str::limit($booking->description, 30)}}
            </p>
            <p class="card-text" style="font-family: 'Times New Roman', Times, serif"><a href="">
                {{ $booking->status }}
                <br>
                {{ $booking->num_people }}
            </a>
          </p>
            <p class="card-text">
              <small class="text-muted">Date of Order: {{ $booking->date }} </small>
            </p>

            <h3 style="margin-top: 20px; text-decoration: underline; margin-bottom: 10px;font-family: 'Times New Roman', Times, serif; font-weight: bold">Status:</h3>
            <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <select name="status" id="status" onchange="this.form.submit()">
                <option value="active" {{ ($booking->status == 'active') ? 'selected' : '' }}>{{ $booking->status }}</option>
                <option value="canceled" {{ ($booking->status == 'canceled') ? 'selected' : '' }}>canceled</option>

                </select>
            </form>
          </div>
        </div>
        
      
    
      </div>
      @endif
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