<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
      }
      .card {
        margin-bottom: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .product-img {
        max-width: 100px;
        max-height: 100px;
        object-fit: cover;
        border-radius: 8px;
      }
      .btn-submit {
        border-radius: 8px;
        background-color: #007bff;
        color: white;
        border: none;
        transition: background-color 0.3s;
      }
      .btn-submit:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    @include('layouts.navbar')
    <div class="container my-5">
      <h1 class="text-center mb-4">Your Orders</h1>

      <!-- Check if user is logged in -->
      @if(session('id'))
        <form action="{{ route('receipts') }}" method="POST">
          @csrf

          <!-- Display orders -->
          @foreach($orders as $order)
            <div class="card p-3">
              <div class="row align-items-center">
                <div class="col-md-2 text-center">
                  <img
                    src="data:image/png;base64,{{ $order->img}}"
                    alt="{{ $order->name }}"
                    class="product-img"
                  >
                </div>
                <div class="col-md-8">
                  <h3><b>Product:</b> {{ $order->name }}</h3>
                  <p><b>Quantity:</b> {{ $order->Quantity }}</p>
                  <p><b>Price:</b> {{ $order->Total }}</p>
                </div>
              </div>
            </div>
          @endforeach

          <!-- Grand Total -->
          <div class="text-end my-3">
            <h4><strong>Grand Total:</strong> {{ $grandTotal }}</h4>
          </div>

          <!-- Submit Order Button -->
          <div class="text-center">
            <button type="submit" class="btn btn-submit px-4 py-2">Submit Order</button>
          </div>
        </form>
      @else
        <!-- Redirect back to login if no user session -->
        <script>window.location = "login";</script>
      @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
