<template>
  <div class="product selected">
    <div class="row">
      <div class="col-md-4">
        <img :src="'/'+image_src" :alt="name">
      </div>
      <div class="col-md-3">
        <span class="product name">
          <strong>{{ name }}</strong>
        </span><br>
        <span class="product price">{{ price }} UAN</span><br>
        <button @click="decrementAmount()">-</button>
        <span class="amount">
          <strong>{{amount}}</strong>
        </span>
        <button @click="incrementAmount()">+</button>
        <br>
      </div>
      <div class="col-md-1 offset-md-4">
        <button @click="removeProduct()" type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CartProductItem",
  props: {
    id: Number,
    name: String,
    price: Number,
    amount: Number,
    image_src: String,
    index: Number
  },
  methods: {
    incrementAmount() {
      if(this.amount < 15) {
        this.$root.incrementAmount(this.index);
      }

    },
    decrementAmount() {
      if(this.amount > 1) {
        this.$root.decrementAmount(this.index);
      }
    },
    removeProduct() {
      this.$root.removeProduct(this.index);
    }
  }
}
</script>

<style scoped>
.close {
margin-top: 2px;
}
  .amount{
  margin-left: 3px;
  margin-right: 3px;
}

</style>