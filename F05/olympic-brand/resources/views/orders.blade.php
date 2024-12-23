
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Orders</h1>
    <!-- Check if user is logged in -->
    @if(session('id'))
        <div class="container">
            <form action="{{ route('receipts') }}" method="POST" class="form">
            @csrf
                @foreach($orders as $order)
                    <div class="card text-center">
                        <p><b>product:</b> {{ $order-> name }}</p>
                        <p><b>control Number:</b>  {{ $order-> controlNumber }} </p>
                        <p><b>quantity:</b>  {{ $order-> Quantity }} </p>
                        <p><b>price:</b>  {{ $order-> Total }} </p>
                    </div>
                @endforeach

                <p><strong>Grand Total: {{ $grandTotal }}</strong></p>
                <button type="submit"> Submit Order </button>
            </form>
        </div>

    @else
    <!-- Redirect back to login if no user session -->
    <script>window.location = "login";</script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
