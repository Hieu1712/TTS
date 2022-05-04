<x-my-admin>
    <x-slot name="slot">
    @if (session('msg'))
    <div class="alert alert-success">
        {{session('msg')}}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif
        <div class="card-body">
            <table class="table table-bordered" id="table2excel">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th class="noExl" style="width: 40px">Label</th>
                        <th class="noExl">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorys as $category)
                    <tr>
                        <td>{{ $loop->index + 1 }}.</td>
                        <td>
                            <a href="{{ route('admin.categorys.show', ['category' => $category->id]) }}">
                                {{ $category->name }}
                            </a>
                        </td>
                        <td>{{ $category->image }}</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('admin.categorys.edit', ['category' => $category->id]) }}" class="btn-info btn-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{route('admin.categorys.destroy',['category' => $category->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button style="margin: 0 0 2px 9px; height: 21px;" onclick="return confirm('Want to delete?');" class="btn btn-danger btn-xs confirm-delete" type="submit"><i class="fas fa-trash-alt"></i></button>               
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> <br>
            <input type="submit" value="Export file Excel" class="excel btn btn-primary">
        </div> 
    </x-slot>
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".excel").click(function(){
                $("#table2excel").table2excel({
                    name: "Worksheet Name",
                    filename: "FileExcel",
                    fileext: ".xls"
                }); 
            });
        });
    </script>
@endsection
</x-my-admin>