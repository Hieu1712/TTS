<x-time-zone>
    @section('page_title')
        Watch Shop
    @endsection
    <main>
        <!-- Hero Area Start-->
        @include('partials.my-slider')
        <!-- Hero Area End-->
        <!-- Latest Products Start -->
        <section class="popular-items latest-padding">
            <div class="container">
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>                                                      
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <h3>Products</h3>
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                        @foreach ($products as $product)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img style="width: 360px; height: 400px;" src="/time-zone/assets/img/gallery/{{ $product->image_url }}" alt="">
                                        <div class="img-cap">
                                            <span class="add-to-card" data-product_id="{{ $product->id }}">Add to cart</span>
                                        </div>
                                        <div class="favorit-items">
                                            <span class="flaticon-heart"></span>
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3>
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                        </h3>
                                        <span>$ {{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $products->links('partials.pagination') }}

                        </div>
                    </div>
                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        @include('partials.shop-method')
    </main>
    @section('script')
        <script type="text/javascript">
            $('.add-to-card').click(function(e) {
                e.preventDefault();
                var product_id = $(this).data('product_id');
                var quantity = 1;
                var url = "{{ route('order.save') }}";
                $.ajax(url, {
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                    },
                    success: function (data) {
                        console.log('success');
                        var objData = JSON.parse(data);
                        var newQuantity = Object.size(objData.cart);
                        $('.cart-quantity').text(newQuantity);
                        Swal.fire({
                            icon: 'success',
                            title: 'Your Add Product To Cart',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function () {
                        console.log('fail');
                        Swal.fire({
                            icon: 'error',
                            title: 'Your Add Product To Cart',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            });
        </script>        
    @endsection
</x-time-zone>