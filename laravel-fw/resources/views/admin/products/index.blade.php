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
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="noExl" style="width: 40px">Label</th>
                        <th class="noExl">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->index + 1 }}.</td>
                        <td>
                            <a href="{{ route('admin.products.show', ['product' => $product->id]) }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn-info btn-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <button type="button"
                                        class="btn btn-danger btn-xs confirm-delete"
                                        data-toggle="modal"
                                        data-target="#modal-delete"
                                        data-url="{{ route('admin.products.destroy', ['product' => $product->id]) }}"
                                    >
                                    <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <input style="margin: 15px 0px;" type="submit" value="Export file Excel" class="excel btn btn-primary">
            {{ $products->links('partials.pagination') }}
        </div>
        @include('partials.delete')

        @section('script')
        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('77207eb95c828aabaf01', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                alert(JSON.stringify(data));
            });
        </script>
        @endsection

        
    </x-slot>
</x-my-admin>