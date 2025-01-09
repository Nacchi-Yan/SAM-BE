<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <!-- Sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            /* padding: 30px; */
        }
        h1, h3 {
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .table {
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .confirmation-btn {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .confirmation-btn:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-create {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-create:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
  </head>

  <body>
    @include('layouts.navbarAdmin')

    <!-- Check if user is logged in -->
    @if(session('id'))

        <div class="container my-5">
            <h3>Product Inventory</h3>
            <a href="upload" class="btn btn-create mb-3" role="button">Create New Product</a>
            <table class="table table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>Item</th>
                        <th>Stock No</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category }}</td>
                        <td><img src="data:image/png;base64,{{ $product->img }}" alt="{{ $product->name }}"></td>
                        <td>
                            <a href="{{ route('edit.products', ['productID' => $product->productID]) }}" class="btn btn-sm btn-primary mx-1 mb-1">Edit</a>
                            <a href="{{ route('delete.products', ['productID' => $product->productID]) }}" class="btn btn-sm confirmation-btn mx-1 mb-1" onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
    <!-- Redirect back to login if no user session -->
    <script>window.location = "login";</script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @include('sweetalert::alert')

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure you want to delete this item?",
                text: "This action cannot be undone.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
  </body>
</html>
