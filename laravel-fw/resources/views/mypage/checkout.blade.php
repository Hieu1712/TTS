<x-time-zone>
    @section('page_title')
    Checkout
    @endsection
    <main>
        <section style="padding: 0;" class="checkout_area section_padding">
            <div class="container">
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Billing Details</h3>
                            <form class="row contact_form" action="" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input placeholder="Full name" type="text" class="form-control" id="fullname"
                                        name="name" value="" />
                                    <span class="placeholder1"></span>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input placeholder="Phone number" type="text" class="form-control" id="phone"
                                        name="phone" />
                                    <span class="placeholder1"></span>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input placeholder="Email address" type="text" class="form-control" id="email"
                                        name="email" />
                                    <span class="placeholder1"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input placeholder="Adress" type="text" class="form-control" id="address"
                                        name="address" />
                                    <span class="placeholder1"></span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Shipping Details</h3>
                                        <label for="f-option3">Write your comment.</label>
                                    </div>
                                    <textarea class="form-control" name="message" id="note" rows="1"
                                        placeholder="Order Notes"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                @foreach ($products as $product)
                                <table>
                                    <tr style="height: 50px;">
                                        <td hidden class="order-productId">{{$product->id}}</td>
                                        <td style="font-size: 15px; width: 175px;">{{ $product->name }}</td>
                                        <td class="middle order-quantity" style="font-size: 15px;width: 35px;">{{$productData[$product->id] }}</td>
                                        <td style="font-size: 15px;width: 206px; text-align: end;"><span>$</span>
                                            <span class="total">{{ $product->price * $productData[$product->id] }}</span>
                                        </td>
                                    </tr>
                                </table>
                                @endforeach
                                <ul class="list">

                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">subtotal
                                            <span>$
                                                <span id="subtotal">
                                                    0
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="payment_item active">
                                    <div class="form-check" style="margin-top: 8px">
                                        <input class="form-check-input check-momo" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="option1">
                                        <label class="form-check-label text-radio-online" for="exampleRadios1">
                                            MoMo
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-bottom: 8px">
                                        <input class="form-check-input check-vnpay" type="radio" name="exampleRadios"
                                            id="exampleRadios2" value="option2">
                                        <label class="form-check-label text-radio-online" for="exampleRadios2">
                                            PayPal
                                        </label>
                                    </div>
                                </div>
                                <div class="momo text-center" style="margin-bottom: 16px; display: none">
                                    <img style="width: 57%;" src="/time-zone/assets/img/momo1.jpg" alt="">
                                </div>
                                <div style="display: none" id="paypal-button"></div>
                                <a class="btn_3 purchase" href="">Place an order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!--================End Checkout Area =================-->
    </main>
    @section('script')
    {{-- <script>
        $(document).ready(function() {
            $('.purchase').click(function(e) {
                e.preventDefault();

                quantity = [];
                $('.order-quantity').each(function(){
                    quantity.push($(this).text());
                });

                orderProductId = [];
                $('.order-productId').each(function(){
                    orderProductId.push($(this).text());
                });

                var url = "{{ route('order.purchase') }}";
                $.ajax(url, {
                    type: 'POST',
                    data: {
                        quantity: quantity,
                        orderProductId: orderProductId,
                    },
                    success: function(data) {
                        console.log(data);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Thank you!',
                            showConfirmButton: false,
                            timer: 1500
                        });
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
    </script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.check-momo').click(function() {
                $(".momo").show()
                $("#paypal-button").hide()
            });
            $('.check-vnpay').click(function() {
                $(".momo").hide()
                $("#paypal-button").show()
            });
            $('.purchase').click(function(e) {
                e.preventDefault();
                var name = $('#fullname').val(),
                    phone = $('#phone').val(),
                    email = $('#email').val(),
                    address = $('#address').val(),
                    note = $('#note').val();
                    total_price = $('#subtotal').text();

                    quantity = [];
                $('.order-quantity').each(function(){
                    quantity.push($(this).text());
                });

                orderProductId = [];
                $('.order-productId').each(function(){
                    orderProductId.push($(this).text());
                });

                var url = "{{ route('order.purchase') }}";
                $.ajax(url, {
                    type: 'POST',
                    data: {
                        name: name,
                        phone: phone,
                        email: email,
                        address: address,
                        note: note,
                        total_price,
                        quantity: quantity,
                        orderProductId: orderProductId,
                    },
                    success: function(data) {
                        console.log(data);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Thank you!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.location.href = '/index';
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

            var subtotal = 0;
            $('.total').each(function() {
                subtotal += parseFloat($(this).text());
            });
            subtotal = Math.round(subtotal * 100) / 100;
            $('#subtotal').text(subtotal);

            paypal.Button.render({
              // Configure environment
              env: 'sandbox',
              client: {
                sandbox: 'AWzUSrf58Z3yRUWYcPVNvyMEWSOYxSoQgzt8T1xgBfEJhFhKoYLlrU0fX5PthbkIuglKGwXqsFLUzOVP',
                production: 'demo_production_client_id'
              },
              // Customize button (optional)
              locale: 'en_US',
              style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
              },
          
              // Enable Pay Now checkout flow (optional)
              commit: true,
          
              // Set up a payment
              payment: function(data, actions) {
                return actions.payment.create({
                  transactions: [{
                    amount: {
                      total: `${subtotal}`,
                      currency: 'USD'
                    }
                  }]
                });
              },
              // Execute the payment
              onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                  // Show a confirmation message to the buyer
                  window.alert('Thank you for your purchase!');
                });
              }
            }, '#paypal-button');
        });
    </script>
    @endsection
</x-time-zone>