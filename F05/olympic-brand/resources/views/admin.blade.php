
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    {{-- sweet alert  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
     <!-- Check if user is logged in -->
    @if(session('id'))
        <h1>Admin</h1>

        <div class="container my-5">
            <h3>Inventory</h3>
                <a href="upload" class="btn mx-1 mb-3" role="button">Create New</a>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>stock no</th>
                            <th>description</th>
                            <th>price</th>
                            <th>category</th>
                            <th>image</th>
                            <th>action</action>

                        </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $products)
                    <tr>
                        <td>{{ $products->name}}</td>
                        <td>{{ $products->stock}}</td>
                        <td>{{ $products->description}}</td>
                        <td>{{ $products->price}}</td>
                        <td>{{ $products->category}}</td>

                        <td><img src="data:image/png;base64,{{ $products->img}}"></td>

                        <td>
                            <a href="{{ route('edit.products', ['productID' => $products->productID]) }}"  class='btn btn-sm mx-1 mb-1'>Edit</a>
                            <a href="{{ route('delete.products', ['productID' => $products->productID]) }}"  class='btn btn-sm mx-1 mb-1'
                                onclick = "confirmation(event)">
                                Delete
                            </a>
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
          console.log(urlToRedirect);
          swal({
              title: "Are you sure you want to delete this Item?",
              text: "You will not be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willCancel) => {
              if (willCancel) {



                  window.location.href = urlToRedirect;

              }


          });


      }
    </script>
  </body>
</html>
