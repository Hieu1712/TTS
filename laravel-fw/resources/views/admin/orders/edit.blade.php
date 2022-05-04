<x-my-admin>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Order</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.orders.update', ['order' => $order->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" value="{{ $order->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control" value="{{ $order->phone }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" value="{{ $order->email }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" type="text" class="form-control" value="{{ $order->address }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Note</label>
                            <input name="note" type="text" class="form-control" value="{{ $order->note }}">
                        </div>
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</x-my-admin>