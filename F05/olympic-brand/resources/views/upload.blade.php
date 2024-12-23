<div class="container d-flex justify-content-center">
    <form style="width:50vw; min-width:300px;" action="upload" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="row mt-5">
                <h3>Edit </h3>
            </div>
            <div class="col">
                <label class="col col-form-label" for="flavour">name:</label>
                <input type="text"  class="form-control" name="name" required>
                <input type="text"  class="form-control" name="stock"  required>
                <input type="text"  class="form-control" name="description" required>
                <input type="text"  class="form-control" name="price"  required>
                <input type="text"  class="form-control" name="category"  required>
                <input type="file" name="file" required> <br><br>
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <button class="btn mt-3" type="submit">Update</button>
        </div>
    </form>
</div>
