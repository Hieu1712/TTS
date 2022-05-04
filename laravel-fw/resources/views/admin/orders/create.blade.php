<x-my-admin>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Order</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.orders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter ..." value="{{ old('name', @$order->name) }}">
                        </div>
                        <!-- @if ($errors->has('name'))
                        <p style="color: red;">{{ $errors->first('name') }}</p>
                        @endif -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control" placeholder="Enter ..." value="{{ old('phone', @$order->phone) }}">
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
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Enter ..." value="{{ old('email', @$order->email) }}">
                        </div>
                        <!-- @if ($errors->has('quantity'))
                        <p style="color: red;">{{ $errors->first('quantity') }}</p>
                        @endif -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" type="text" class="form-control" placeholder="Enter ..." value="{{ old('address', @$order->address) }}">
                        </div>
                        <!-- @if ($errors->has('quantity'))
                        <p style="color: red;">{{ $errors->first('quantity') }}</p>
                        @endif -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Note</label>
                            <input name="note" type="text" class="form-control" placeholder="Enter ..." value="{{ old('note', @$order->note) }}">
                        </div>
                        <!-- @if ($errors->has('quantity'))
                        <p style="color: red;">{{ $errors->first('quantity') }}</p>
                        @endif -->
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</x-my-admin>