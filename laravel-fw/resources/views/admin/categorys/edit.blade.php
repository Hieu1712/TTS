<x-my-admin>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.categorys.update', ['category' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" value="{{ $category->name }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" value="{{ $category->image }}">
                            <label class="custom-file-label" for="image">
                                @if (isset($category))
                                {{ $category->image }}
                                @else
                                Choose file
                                @endif
                            </label>
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
                $('.custom-file-label').html(fileName);
            });
        });
    </script>
    @endsection
</x-my-admin>