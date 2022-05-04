<x-my-admin>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Order Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.orderproducts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Product ID</label>
                            <select class="custom-select" name="product_id">
                                @foreach ( $products as $product)
                                <option value="{{ $product->id }}">{{ $product->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Order ID</label>
                            <select class="custom-select" name="order_id">
                                @foreach ( $orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }}</option>
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
                            <input name="quantity" type="text" class="form-control" placeholder="Enter ..." value="{{ old('quantity', @$orderproduct->quantity) }}">
                        </div>
                        <!-- @if ($errors->has('price'))
                        <p style="color: red;">{{ $errors->first('price') }}</p>
                        @endif -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="text" class="form-control" placeholder="Enter ..." value="{{ old('price', @$orderproduct->price) }}">
                        </div>
                        <!-- @if ($errors->has('name'))
                        <p style="color: red;">{{ $errors->first('name') }}</p>
                        @endif -->
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</x-my-admin>