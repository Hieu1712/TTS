<x-my-admin>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Order</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.orderproducts.update', ['orderproduct' => $orderproduct->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Product ID</label>
                            <select class="custom-select" name="product_id">
                                @foreach ( $products as $product)
                                <option value="{{ $product->id }}" @if ($product->id == $orderproduct->product_id)
                                    selected
                                    @endif
                                    >
                                    {{ $product->id }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Product ID</label>
                            <select class="custom-select" name="order_id">
                                @foreach ( $orders as $order )
                                <option value="{{ $order->id }}" @if ($order->id == $orderproduct->order_id)
                                    selected
                                    @endif
                                    >
                                    {{ $order->id }}
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
                            <label>Quantity</label>
                            <input name="quantity" type="text" class="form-control" value="{{ $orderproduct->quantity }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="text" class="form-control" value="{{ $orderproduct->price }}">
                        </div>
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</x-my-admin>