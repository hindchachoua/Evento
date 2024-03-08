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

    <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
    aria-labelledby="nav-ContactForm-tab">
<form class="custom-form contact-form mb-5 mb-lg-0"  style="margin-top: 15%;" action="{{ route('categories.store') }}" method="post"
        role="form">
@csrf
<h1 class="text-center  mb-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold; margin-top: -5%;">Add Categories:</h1>
<div style="width: 50%; height: 50%; margin-left: 25%; margin-bottom: 5%;">
<div class="row">
<div class="col-lg-6 col-md-6 col-12">
<input type="text" name="name_category" id="name_category" class="form-control" placeholder="Name of category" required>
</div>

<br>


<div class="col-lg-4 col-md-10 col-8 mx-auto">
<button type="submit" class="form-control">Add</button>
</div>
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