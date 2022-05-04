<x-my-admin>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Category</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.categorys.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter ..." value="{{ old('name', @$category->name) }}">
                        </div>
                        <!-- @if ($errors->has('name'))
                        <p style="color: red;">{{ $errors->first('name') }}</p>
                        @endif -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label>Image</label>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <!-- @if ($errors->has('image_url'))
                        <p style="color: red;">{{ $errors->first('image_url') }}</p>
                        @endif -->
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