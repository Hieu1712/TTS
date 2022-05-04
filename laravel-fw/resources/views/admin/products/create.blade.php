<x-my-admin>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Product</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="custom-select" name="category_id">
                                @foreach ( $categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                            <input name="name" type="text" class="form-control" placeholder="Enter ..." value="{{ old('name', @$product->name) }}">
                        </div>
                        @if ($errors->has('name'))
                        <p style="color: red;">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="descripti" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                        @if ($errors->has('descripti'))
                        <p style="color: red;">{{ $errors->first('descripti') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label>Image</label>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image_url">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        @if ($errors->has('image_url'))
                        <p style="color: red;">{{ $errors->first('image_url') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="text" class="form-control" placeholder="Enter ..." value="{{ old('price', @$product->pricw) }}">
                        </div>
                        @if ($errors->has('price'))
                        <p style="color: red;">{{ $errors->first('price') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Quantity</label>
                            <input name="quantity" type="text" class="form-control" placeholder="Enter ..." value="{{ old('quantity', @$product->quantity) }}">
                        </div>
                        @if ($errors->has('quantity'))
                        <p style="color: red;">{{ $errors->first('quantity') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group">
                            <div class="form-check">
                                <input name="status" class="form-check-input" type="checkbox" checked="" value="1">
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