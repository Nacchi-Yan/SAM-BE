
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Products</h1>

    <div class="container">
        <div class="row">
            @foreach($products as $prod)
            <div class="col">
                <div class="card">
                    @php
                        $stock = $prod->stock;
                    @endphp

                    @if ($stock>0)
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $prod->name }}</h5>
                            <p class="card-text">{{ $prod->description }}</p>
                            <p class ="card-text">{{ $prod->price }}</p>
                            <input type="text" name="quantity"><br><br>
                            <a href="#" class="btn btn-primary">Add Item</a>
                        </div>
                    @else
                        <div class="card" style="display: none;">

                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
