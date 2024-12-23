
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
     <!-- Check if user is logged in -->
     @if(session('id'))
        <div class="container">
            <div class="row">
                @foreach($products as $prod)
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
                                {{-- quantity couter --}}
                                <div class="row">
                                    <div class="col">
                                        <!-- Add Item Button -->
                                        <button
                                        class="btn btn-primary add-item"
                                        id="add-item-{{ $prod->productID }}"
                                        onclick="incrementQuantity({{ $prod->productID }}, {{ $stock }})"
                                        >
                                            +
                                        </button>
                                    </div>
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
                                    <div class="col">
                                        <!-- Minus Button -->
                                        <button
                                        class="btn btn-secondary minus-item"
                                        id="minus-item-{{ $prod->productID }}"
                                        onclick="decrementQuantity({{ $prod->productID }})"
                                        {{ $stock == 0 ? 'disabled' : '' }}
                                        >
                                            -
                                        </button>
                                    </div>
                                </div>

                                <button class="btn btn-primary submit">
                                    Add Item
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
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
  <script>
    function incrementQuantity(productID, stock) {
        const quantityInput = document.getElementById(`quantity-${productID}`);
        const addItemButton = document.getElementById(`add-item-${productID}`);
        const minusItemButton = document.getElementById(`minus-item-${productID}`);

        let quantity = parseInt(quantityInput.value) || 0;
        if (quantity < stock) {
            quantity++;
            quantityInput.value = quantity;
        }

        // Disable the Add button if quantity equals stock
        addItemButton.disabled = quantity >= stock;

        // Enable Minus button if quantity is greater than 0
        minusItemButton.disabled = quantity <= 0;
    }

    function decrementQuantity(productID) {
        const quantityInput = document.getElementById(`quantity-${productID}`);
        const addItemButton = document.getElementById(`add-item-${productID}`);
        const minusItemButton = document.getElementById(`minus-item-${productID}`);

        let quantity = parseInt(quantityInput.value) || 0;
        if (quantity > 0) {
            quantity--;
            quantityInput.value = quantity;
        }

        // Enable the Add button if quantity is less than stock
        addItemButton.disabled = quantity >= parseInt(quantityInput.max);

        // Disable Minus button if quantity equals 0
        minusItemButton.disabled = quantity <= 0;
    }
</script>

</html>
