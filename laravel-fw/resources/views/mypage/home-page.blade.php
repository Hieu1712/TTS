<x-time-zone>
    @section('page_title')
        Time Zone
    @endsection
    <x-slot name="slot">
        <main>
            <div id="app"> 
                {{-- <header-component></header-component> --}}
                <slider-component></slider-component>
                <category-component :list-category="{{ $category }}"></category-component>
                <gallery-component></gallery-component>
                <product-component :list-product="{{ $products }}"></product-component>
                <shopmethod-component></shopmethod-component>
                {{-- <footer-component></footer-component> --}}
            </div>
            <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>  
            <!--? slider Area Start -->
            {{-- @include('partials.my-slider') --}}
            <!-- slider Area End-->

            <!-- ? New Product Start -->
            {{-- @include('partials.new-product') --}}
            <!--  New Product End -->

            <!--? Gallery Area Start -->
            {{-- @include('partials.gallery') --}}
            <!-- Gallery Area End -->

            <!--? Popular Items Start -->
            {{-- <div class="popular-items section-padding30">
                <div class="container">
                    <!-- Section tittle -->
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8 col-md-10">
                            <div class="section-tittle mb-70 text-center">
                                <h2>Popular Items</h2>
                                <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                            </div>
                        </div>
                    </div>
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
                    </div>
                    <!-- Button -->
                    <div class="row justify-content-center">
                        <div class="room-btn pt-70">
                            <a href="{{ route('products') }}" class="btn view-btn1">View More Products</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Popular Items End -->
            <!--? Video Area Start -->
            <!-- Video Area End -->
            <!--? Watch Choice  Start-->
            <!-- Watch Choice  End-->
            <!--? Shop Method Start-->
            {{-- @include('partials.shop-method') --}}
            <!-- Shop Method End-->
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
    </x-slot>
</x-time-zone>