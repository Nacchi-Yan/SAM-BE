<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
          background-color: #f8f9fa;
          font-family: Arial, sans-serif;
          font-weight: 600;
          color: #495057;
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
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    @include('layouts.navbarAdmin')

    <div class="container d-flex justify-content-center mt-3">
        <form action="{{ route('update.products', ['productID' => $products->productID]) }}" method="post" style="width:100%; max-width:600px;" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Using the PUT method for updates --}}

            <!-- Form Title -->
            <div class="row mb-4">
                <h3 class="text-center">Edit Product</h3>
            </div>

            <!-- Form Fields -->
            <div class="col">
                <!-- Product Name -->
                <div class="mb-3">
                    <label class="form-label" for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $products->name }}" required>
                </div>

                <!-- Product Stock -->
                <div class="mb-3">
                    <label class="form-label" for="stock">Stock:</label>
                    <input type="number" class="form-control" name="stock" value="{{ $products->stock }}" required>
                </div>

                <!-- Product Description -->
                <div class="mb-3">
                    <label class="form-label" for="description">Description:</label>
                    <input type="text" class="form-control" name="description" value="{{ $products->description }}" required>
                </div>

                <!-- Product Price -->
                <div class="mb-3">
                    <label class="form-label" for="price">Price:</label>
                    <input type="text" class="form-control" name="price" value="{{ $products->price }}" required>
                </div>

                <!-- Product Category -->
                <div class="mb-3">
                    <label class="form-label" for="category">Category:</label>
                    <input type="text" class="form-control" name="category" value="{{ $products->category }}" required>
                </div>

                <!-- Product Image -->
                <div class="mb-3">
                    <label class="form-label" for="file">Image:</label>
                    <input type="file" class="form-control" name="file">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-4 mb-2">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
