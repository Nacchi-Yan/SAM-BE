
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('layouts.navbar')
    <h1>Products</h1>
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
        <p>Control Number: {{ session('currentControlNumber') }}</p>
        @endif
        <div class="container">
            <div class="row">
                @foreach($products as $prod)
                    <form action="{{ route('Add') }}" method="POST" class="form">
                        @csrf
                        @php
                            $stock = $prod->stock;
                        @endphp
                        <div class="col">
                            @if ($stock > 0)
                                <div class="card text-center">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $prod->name }}</h5>
                                        <p class="card-text">{{ $prod->description }}</p>
                                        <p class="card-text">{{ $prod->price }}</p>
                                        <div class="row">

                                            <div class="col">
                                                <!-- Input for quantity -->
                                                <input
                                                type="number"
                                                name="quantity"
                                                placeholder="0"
                                                value="0"
                                                min="0"
                                                max="{{ $stock }}"
                                                id="quantity-{{ $prod->productID }}"
                                                class="quantity-input text-center">
                                                <br><br>

                                            </div>

                                        </div>
                                            <input type="text" name="productID" value={{ $prod->productID }} placeholder={{ $prod->productID }}>
                                            <input type="text" name="controlNumber" value={{ $controlNumber}}>
                                            <input type="text" name="status" value="pending">
                                        <button class="btn btn-primary submit" type="submit">
                                            Add Item
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
     @else
     <!-- Redirect back to login if no user session -->
     <script>window.location = "login";</script>
     @endif




    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>


</html>
