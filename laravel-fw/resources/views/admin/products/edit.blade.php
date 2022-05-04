<x-my-admin>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="custom-select" name="category_id">
                                @foreach ( $categorys as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $product->category_id)
                                    selected
                                    @endif
                                    >
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" value="{{ $product->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="descripti" class="form-control" rows="3">{{ $product->descripti}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="text" class="form-control" value="{{ $product->price }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Quantity</label>
                            <input name="quantity" type="text" class="form-control" value="{{ $product->quantity }}">
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
                <label for="formFile" class="form-label">Default file input example</label>
                <input name="image_url" class="form-control" type="file" id="formFile">
            </div>
          </div>
        </div> -->
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image_url" value="{{ $product->image_url }}">
                            <label class="custom-file-label" for="image">
                                @if (isset($product))
                                {{ $product->image_url }}
                                @else
                                Choose file
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group">
                            <div class="form-check">
                                <input name="status" class="form-check-input" type="checkbox" value="1" @if ($product->status)
                                checked
                                @endif
                                >
                                <label class="form-check-label">Status</label>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    @section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var fileName = e.target.files[0].name;
                console.log(fileName);
                $('.custom-file-label').html(fileName);
            });
        });
    </script>
    @endsection
</x-my-admin>