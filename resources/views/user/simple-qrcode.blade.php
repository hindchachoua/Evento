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

	<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .ticket-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        hr {
            border: 1px solid #ddd;
            margin: 20px 0;
        }

        .print-button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .ticket-container, .ticket-container * {
                visibility: visible;
            }

            .ticket-container {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    
    @include('layouts.navigation')

	<div class="ticket-container text-center mt-5 mb-5">
        <h2  style="font-size: 30px; font-weight: bold">Your ticket :</h2>
        <p><strong>Event title:</strong> {{ $reservation->event->title }}</p>
        <p><strong>Description of event:</strong> {{ $reservation->event->description }}</p> 
        <p><strong>Date of event:</strong> {{ $reservation->event->date }}</p>
        <p><strong>Event location:</strong> {{ $reservation->event->location }}</p>
        <p><strong>Number of People in Reservation:</strong> {{ $reservation->num_people }}</p>
        <!-- Add more details as needed -->

        <hr>

		<div>
			<h2>QR Code</h2>
       			 {{ $qrcode }}
		</div>
        

        <div style="text-align: center; margin-top: 20px;">
            <button class="print-button" onclick="printTicket()">Print Ticket</button>
        </div>
    </div>

    <script>
        function printTicket() {
            window.print();
        }
    </script>
    @include('layouts.footer')
    
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>