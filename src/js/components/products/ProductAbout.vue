<template>
  <div class="about-product">
    <div class="row">
      <div class="about-product">
        <img :src='"/"+product.image_src' alt="product">
        <span class="category"><strong>{{product.name}}</strong></span><br>
        <span class="category"><strong>{{product.category}}</strong></span><br>
        <span class="detail description">{{product.description}}</span><br>
        <span class="price"><strong>{{product.price}} UAN</strong></span><br>
        <button class="add-to-cart">Add to cart</button>
      </div>
      <img src="" alt="loading">
    </div>
  </div>
</template>

<script>
export default {
  name: "ProductAbout",
  props: {
    dataId: {
      type: Number,
      isRequired: true
    }
  },
  data: () => ({
    product: []
  }),
  mounted() {
    this.fetchProduct();
  },
  methods: {
    async fetchProduct() {
      const response = await fetch('/api/get/' + this.dataId);
      this.product = await response.json();
      console.log(this.product);
    }
  }
}
</script>

<style scoped>
img {
  width: 150%;
}
</style>