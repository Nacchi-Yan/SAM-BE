<div class="container d-flex justify-content-center">
    <form action="{{ route('update.products', ['productID' => $products->productID]) }}" method="post" style="width:50vw; min-width:300px;"  enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Using the PUT method for updates --}}
        <div class="row">
            <div class="row mt-5">
                <h3>Edit </h3>
            </div>
            <div class="col">
                <label class="col col-form-label" for="flavour">name:</label>
                <input type="text"  class="form-control" name="name" value="{{ $products->name }}" required>
                <input type="text"  class="form-control" name="stock" value="{{ $products->stock }}" required>
                <input type="text"  class="form-control" name="description" value="{{ $products->description }}" required>
                <input type="text"  class="form-control" name="price" value="{{ $products->price }}" required>
                <input type="text"  class="form-control" name="category" value="{{ $products->category }}" required>
                <input type="file" name="file" required> <br><br>
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <button class="btn mt-3" type="submit">Update</button>
        </div>
    </form>
</div>
