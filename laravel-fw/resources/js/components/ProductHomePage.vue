<template>
  <div class="popular-items section-padding30">
    <div class="container">
      <!-- Section tittle -->
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-10">
          <div class="section-tittle mb-70 text-center">
            <h2>Popular Items</h2>
            <p>
              Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
              labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
              gravida.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        
        <div 
            v-for="(product, index) in products" :key
            class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="single-popular-items mb-50 text-center">
            <div class="popular-img">
              <img
                style="width: 360px; height: 400px"
                :src="'/time-zone/assets/img/gallery/' + product.image_url"
                alt=""
              />
              <div class="img-cap">
                <span class="add-to-card" :data-product_id="product.id"
                  >Add to cart</span
                >
              </div>
              <div class="favorit-items">
                <span class="flaticon-heart"></span>
              </div>
            </div>
            <div class="popular-caption">
              <h3>
                <a
                  :href="'/product-details/' + product.id"
                  >{{ product.name }}</a
                >
              </h3>
              <span>$ {{ product.price }} </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Button -->
      <div class="row justify-content-center">
        <div class="room-btn pt-70">
          <a :href="'/shop'" class="btn view-btn1"
            >View More Products</a
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// export default {
//     mounted() {
//         console.log("Component mounted.");
//     },
// };
export default {
    props: ['listProduct'],
    data() {
        return {
            products: this.listProduct.data,
        }
    },
    // methods: {
    //     getProduct(){
    //         axios.get('/')
    //             .then((response)=>{
    //             this.products = response.data
    //             console.log(this.products)
    //         })
    //     }
    // },
    // created() {
    //     this.getProduct()
    // }
}
</script>
