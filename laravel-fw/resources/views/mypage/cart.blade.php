<x-time-zone>
    @section('page_title')
    Cart List
    @endsection
    <main>
        <!-- Hero Area Start-->
        <!-- <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Cart List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--================Cart Area =================-->
        <section style="padding: 0px 0px;" class="cart_area section_padding">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="/time-zone/assets/img/gallery/{{ $product->image_url }}" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        $<span class="price">{{ $product->price }}</span>
                                    </td>
                                    <td class="quantity">
                                        <div class="input-group col-5">
                                            <input type="number" name="quantity"
                                                class="product-quantity quantity form-control input-number"
                                                value="{{ $productData[$product->id] }}"
                                                min="1"
                                                max="100"
                                                data-product_id="{{ $product->id }}"
                                            >
                                        </div>
                                    </td>
                                    <td>
                                        $<span class="total">{{ $product->price * $productData[$product->id] }}</span>
                                    </td>
                                    <td>
                                        <button class="btn-delete fa-close" data-product_id="{{ $product->id }}" style="background-color: red; cursor: pointer; border: 1px solid #e51515;"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td> </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        $<span id="subtotal">0</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            <a class="btn_1 checkout_btn_1" href="/checkout">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
        </section>
        <!--================End Cart Area =================-->
    </main>
    @section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.fa-close').click(function(e) {
                e.preventDefault();
                var productEl = $(this).parent().parent();
                var product_id = $(this).data('product_id');
                var url = "{{ route('deletecart') }}";

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax(url, {
                            type: 'POST',
                            data: {
                                product_id: product_id,
                            },
                            success: function(data) {
                                console.log('success');
                                var objData = JSON.parse(data);
                                var newQuantity = Object.size(objData.cart);
                                $('.cart-quantity').text(newQuantity);
                                productEl.remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            },
                            error: function() {
                                console.log('fail');
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'error'
                                )
                            }
                        });
                    }
                });
            });

            $('.product-quantity').click(function() {
                var newQuantity = $(this).val();
                var trElement = $(this).closest('tr');
                var url = "{{ route('order.update') }}";
                var product_id = $(this).data('product_id');
                var price = parseInt(trElement.find('.price').text());
                var totalPrice = price * newQuantity;
                totalPrice = Math.round(totalPrice * 100) / 100;
                var totalElement = trElement.find('.total');
                $.ajax(url, {
                    type: 'PUT',
                    data: {
                        product_id: product_id,
                        quantity: newQuantity,
                    },
                    success: function(data) {
                        console.log('success');
                        var objData = JSON.parse(data);
                        console.log(objData);
                        if (objData.status === false) {
                            location.reload();
                        }
                        totalElement.text(totalPrice);
                        var subtotal = 0;
                        $('.total').each(function() {
                            subtotal += parseFloat($(this).text());
                        });
                        subtotal = Math.round(subtotal * 100) / 100;
                        $('#subtotal').text(subtotal);
                    },
                    error: function() {
                        console.log('fail');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Failed!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });

        });
    </script>
    @endsection
</x-time-zone>