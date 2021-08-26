<template>
  <div class="container">
    <product-item
        v-for="product in products"
        :key="product.id"
        :id="product.id"
        :name="product.name"
        :price="product.price"
        :image_src="product.image_src"
        :description="product.description"
        @add-to-cart="addToCart(product)"
        />


  </div>
</template>

<script>
import ProductItem from "./ProductItem";

export default {
  name: "ProductsList",
  components: {
    ProductItem
  },
  data: () => ({
    products: [],
  }),
  mounted() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      const response = await fetch('/api/get');
      this.products = await response.json();
    },
    addToCart(product) {
      console.log(product);
      this.$root.addToCart(product);
    }
  }
}
</script>

<style scoped>

</style>