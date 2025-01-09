<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f4f6f9;
        font-family: 'Arial', sans-serif;
      }
      .container {
        margin-top: 40px;
      }
      .product-card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        background-color: white;
        transition: transform 0.3s ease-in-out;
      }
      .product-card:hover {
        transform: translateY(-5px);
      }
      .card-img-top {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
      }
      .product-details {
        padding: 15px;
      }
      .quantity-input {
        width: 60px;
        text-align: center;
        border-radius: 5px;
        padding: 5px;
        border: 1px solid #ccc;
      }
      .submit {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }
      .submit:hover {
        background-color: #0056b3;
      }
      .product-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
      }
      .product-description {
        font-size: 1rem;
        color: #666;
      }
      .product-price {
        font-size: 1.2rem;
        font-weight: bold;
        color: #28a745;
      }
      .control-number {
        text-align: center;
        margin-bottom: 30px;
        font-size: 1.2rem;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    @include('layouts.navbar')

    <div class="container">
      <h1 class="text-center my-4">Products</h1>

      <!-- Check if user is logged in -->
      @if(session('id'))
        @php
          // Check if currentControlNumber is already in the session
          $currentControlNumber = session('currentControlNumber');

          // If not in session, initialize $controlNumber
          $controlNumber = '';

          // If $currentControlNumber is not available, check for controlNumber in the session
          if (!$currentControlNumber) {
              $controlNumber = session('controlNumber'); // Reuse existing control number if available

              // If controlNumber is not available, generate a new one
              if (!$controlNumber) {
                  // Assuming $generateID is an incremental number obtained from somewhere
                  $generateID = rand(1, 9999);
                  $incrementalNumber = str_pad($generateID, 6, '0', STR_PAD_LEFT); //make sure the digits are 6 numbers
                  $controlNumber = now()->format('Y') . sprintf('%02d', now()->isoWeek()) . $incrementalNumber;

                  // Store controlNumber in the session
                  session(['controlNumber' => $controlNumber]);
              }
          }
        @endphp

        @if (session('currentControlNumber'))
        <p class="control-number">Control Number: {{ session('currentControlNumber') }}</p>
        @endif

        <div class="row">
          @foreach($products as $prod)
            @if ($prod->stock > 0)
              <div class="col-md-4">
                <form action="{{ route('Add') }}" method="POST" class="form">
                  @csrf
                  <div class="card product-card">
                    <img src="data:image/png;base64,{{ $prod->img}}" class="card-img-top" alt="{{ $prod->name }}">
                    <div class="card-body product-details">
                      <h5 class="product-title">{{ $prod->name }}</h5>
                      <p class="product-description">{{ $prod->description }}</p>
                        <div class="text-center">
                            <p class="product-price">Php {{ number_format($prod->price, 2) }}</p>
                            <div class="row">
                                <div class="col">
                                <input type="number" name="quantity" class="quantity-input" min="0" max="{{ $prod->stock }}" value="0" id="quantity-{{ $prod->productID }}">
                                </div>
                            </div>
                            <input type="hidden" name="productID" value="{{ $prod->productID }}">
                            <input type="hidden" name="controlNumber" value="{{ $controlNumber }}">
                            <input type="hidden" name="status" value="pending"> <br>
                            <button class="btn submit" type="submit">Add Item</button>
                        </div>

                    </div>
                  </div>
                </form>
              </div>
            @endif
          @endforeach
        </div>
      @else
        <!-- Redirect back to login if no user session -->
        <script>window.location = "login";</script>
      @endif
    </div>

    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
