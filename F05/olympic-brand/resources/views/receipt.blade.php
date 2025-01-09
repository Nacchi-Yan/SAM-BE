<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
      }
      .receipt-container {
        margin: 40px auto;
        padding: 20px;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
      }
      .logo-container {
        text-align: center;
        margin-bottom: 20px;
      }
      .logo-container img {
        max-width: 150px;
        height: auto;
      }
      .card {
        margin: 20px 0;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }
      .btn-back {
        border-radius: 8px;
        background-color: #007bff;
        color: white;
        border: none;
        transition: background-color 0.3s;
        padding: 10px 20px;
      }
      .btn-back:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    @include('layouts.navbar')

    <div class="container my-5">
      @if(session('id'))
        <div class="receipt-container">
          <!-- Logo Section -->
          <div class="logo-container">
            <img src="{{ asset('storage/images/logo.png') }}" alt="Company Logo">
          </div>

          <!-- Thank You Message -->
          <div class="text-center mb-4">
            <h1>Thank You for Ordering!</h1>
            <p>Your order has been successfully placed. Below are your order details:</p>
          </div>

          <!-- Receipt Details -->
          @foreach($receipt as $order)
            <div class="card text-center">
              <h3><b>Control Number:</b> {{ $order->controlNumber }}</h3>
            </div>
          @endforeach

          <!-- Back to Home Button -->
          <div class="text-center mt-4">
            <a href="{{ route('Index') }}" class="btn btn-back">Back to Home</a>
          </div>
        </div>
      @else
        <!-- Redirect back to login if no user session -->
        <script>window.location = "login";</script>
      @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
