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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
        <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    
        <link href="{{ asset('css/templatemo-festava-live.css') }}" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
<body>
    @include('layouts.navigation')
    <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
        <form class="custom-form contact-form mb-5 mb-lg-0" action="{{ route('events.store') }}" method="post"
                                    role="form">
            @csrf
            <div style="width: 50%; height: 50%; margin-left: 25%; margin-top: 5%;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <input type="text" name="description" id="description" class="form-control" placeholder="Description" required>
                        </div>
                                            
                </div>
                <input type="date" name="date" id="date" class="form-control" placeholder="date" required>

                <input type="text" name="location" id="location" class="form-control" placeholder="Location" required>

                <input name="available_tickets" class="form-control" id="available_tickets" placeholder="Number of places"></input>
                <br>
                <input type="checkbox" name="isAuto" id="isAuto" value="0">
                <label for="isAuto">Manulle</label>
                <select name="category_id" id="">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>


                 <div class="col-lg-4 col-md-10 col-8 mx-auto">
                    <button type="submit" class="form-control">Add</button>
                 </div>
                </div>
            </form>
        </div>

        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>