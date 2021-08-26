<template>

      <div class="product-card popular">
        <div class="image-wrapper">
          <a :href="'/products/'+id">
            <div class="primary-image">
              <img :src='image_src' alt="product">
            </div>
          </a>
        </div>
        <div class="product-card-name">
          {{name}}
        </div>
        <div class="product-card-description">
          {{description}}
        </div>
        <div class="button add-to-cart">
          <button
              @click.prevent="add"
              class="add-to-cart"
              :disabled="isSetInCart"
          >
            {{price}} UAN
          </button>
        </div>
      </div>

</template>

<script>
export default {
  name: "ProductItem",
  props: {
    id: {
      type: Number,
      isRequired: true
    },
    name: {
      type: String
    },
    description: {
      type: String
    },
    price: {
      type: Number
    },
    image_src: {
      type: String
    },
  },
  methods: {
    add() {
      this.$emit('add-to-cart');
    },
   },
  computed: {
    isSetInCart() {
      return this.$root.isSetInCart(this.id);
    }
  }
}
</script>

<style scoped>
img{
  width:90%;
  height: 190px;
}
.product-card{
  display: flex;
}
</style>