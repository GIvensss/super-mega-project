<template>
  <div class="cart products">
    <cart-product-item
        v-for="(product, index) in products"
        :index="index"
        :key="product.id"
        :name="product.name"
        :price="product.price"
        :image_src="product.image_src"
        :amount="product.amount"
    />
  </div>
</template>

<script>
import CartProductItem from "./CartProductItem";

export default {
  name: "CartProductsList",
  components: {
    CartProductItem
  },
  computed: {
    products(){
      return this.$root.cart;
    }
  }
}
</script>

<style scoped>

</style>