<template>
  <div v-if="!isEmptyCart()" class="cart">
    <section>
      <div class="cart products">
        <cart-products-list></cart-products-list>
        <h3>Total Price: {{totalPrice}} UAN</h3>
        <cart-order-form></cart-order-form>
      </div>
    </section>
  </div>
  <h1 v-else>CART IS EMPTY</h1>
</template>

<script>
import CartProductsList from "./CartProductsList";
import CartOrderForm from "./CartOrderForm";
export default {
  name: "Cart",
  components: {CartProductsList, CartOrderForm},
  mounted() {
    this.isEmptyCart()
  },
  computed: {
    totalPrice() {
      return this.$root.totalPrice;
    }
  },
  methods: {
    isEmptyCart() {
      return this.$root.isEmptyCart();
    },
  }
}
</script>

<style scoped>
h1 {
  margin: 10%
}
h3 {
  float: right
}
</style>