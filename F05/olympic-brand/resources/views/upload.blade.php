<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            /* padding: 30px; */
        }
        h3 {
            color: #343a40;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 600;
            color: #495057;
        }
        .btn-update {
            background-color: #28a745;
            color: white;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
        }
        .btn-update:hover {
            background-color: #218838;
            cursor: pointer;
        }
        .row.mt-5 {
            margin-top: 20px;
        }
    </style>
  </head>
  <body>
    @include('layouts.navbarAdmin')
    <div class="container d-flex justify-content-center mt-3">
        <form style="width:100%; max-width:600px;" action="upload" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 mb-4">
                    <h3>Create Product</h3>
                </div>
                <div class="col-12">
                    <label for="name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-12">
                    <label for="stock" class="col-form-label">Stock:</label>
                    <input type="text" class="form-control" name="stock" required>
                </div>
                <div class="col-12">
                    <label for="description" class="col-form-label">Description:</label>
                    <input type="text" class="form-control" name="description" required>
                </div>
                <div class="col-12">
                    <label for="price" class="col-form-label">Price:</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                <div class="col-12">
                    <label for="category" class="col-form-label">Category:</label>
                    <select class="form-control" name="category" required>
                        <option value="" disabled selected>Select a Category</option>
                        <option value="food">Food</option>
                        <option value="drink">Drink</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="file" class="col-form-label">Image:</label>
                    <input type="file" class="form-control" name="file" required>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-update mt-3" type="submit">Update Product</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
