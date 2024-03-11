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

    <div class="max-w-7xl mx-auto py-6 px-4 " >
        <form action="{{ route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <h1 class="text-center mt-5 mb-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold">Edit " {{ $category->name }} ":</h1>
                <label class="form-label" style="font-family: Georgia, serif;">Name</label>
                <input class="form-control" type="text" name="name" placeholder="Name" value="{{ $category->name }}">
            </div>
            
            
            <button style="background-color: #ee5007 ; color: white" type="submit" class="btn">Update</button></button>
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