<template>
  <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-tittle mb-70">
                    <h2>Category</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div
                v-for="(category, index) in Categorys" :key="index"
                class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-new-pro mb-30 text-center">
                    <div class="product-img">
                        <img :src="'/time-zone/assets/img/gallery/' + category.image" alt="">
                    </div>
                    <div class="product-caption">
                        <h3>
                            <a :href="'/category/' + category.id">{{ category.name }}</a>    
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['listCategory'],
    data() {
        return {
            Categorys: this.listCategory.data,
        }
    },
}
</script>

<style scoped>
    .container {
        padding-top: 30px;
    }
    .mb-70 {
        margin-bottom: 30px;
    }
</style>>
