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

    <h1 class="text-center mt-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold;font-family: 'Times New Roman', Times, serif">Edit Event:</h1>
    <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
        <form class="custom-form contact-form mb-5 mb-lg-0" action="{{ route('organizer.events.update', ['id' => $event->id]) }}" method="post"
                                    role="form">
            @csrf
            @method('patch')
            <div style="width: 50%; height: 50%; margin-left: 25%; margin-top: 5%;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $event->title }}" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="{{ $event->description }}" required>
                        </div>
                                            
                </div>
                <input type="date" name="date" id="date" class="form-control" placeholder="date" value="{{ $event->date }}" required>

                <input type="text" name="location" id="location" class="form-control" placeholder="Location" value="{{ $event->location }}" required>

                <input name="available_tickets" class="form-control" id="available_tickets" value="{{ $event->available_tickets }}" placeholder="Number of places"></input>
                <h1>category: {{ $event->category->name }}</h1>
                <h1>validation: @if($event->isAuto == 0) Manulle @else Auto @endif</h1>
                <br>
                <input type="checkbox" name="isAuto" id="isAuto" value="0">
                <label for="isAuto">Manulle</label>
                <select name="category_id" id="">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>


                 <div class="col-lg-4 col-md-10 col-8 mx-auto">
                    <button type="submit" class="form-control">Edit</button>
                 </div>
                </div>
            </form>
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