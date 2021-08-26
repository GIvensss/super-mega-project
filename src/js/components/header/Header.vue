<template>
  <header>
    <div class="ceiling">
      <div class="row">
        <div class="col-md-4">
          <a href="/">
            <img class="main-icon" src="/src/images/rock-symbol.svg" alt="rock-ico">
          </a>
        </div>
        <div class="col-md-4 offset-md-4">
          <a href="/cart">
            <img class="basket-icon" src="/src/images/basket.svg" alt="basket">
            <span class="badge bg-secondary mx-2 cartProductAmount">
              {{totalAmount}}
            </span>
          </a>

          <a href="/cabinet/index">
            <img class="cabinet-icon" src="/src/images/punk.png" alt="cabinet">
          </a>
          <a href="/auth/logout">
            <img class="logout-icon" src="/src/images/log-out.png" alt="logout">
          </a>
          <a href="/auth">
            <img class="cabinet-icon" src="/src/images/punk.png" alt="cabinet">
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-2">
          <input type="search" class="search" name="q" placeholder="Search">
        </div>
        <div class="col-md-2">
          <button type="submit" class="search" value="Search">Search</button>
        </div>
      </div>
    </div>
    <div class="row">
      <nav>
        <div class="menu">
          <ol class="menu">
            <li>Categories</li>
            <li>Bands</li>
            <li>About</li>
            <li>Feedback</li>
          </ol>
        </div>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
  name: "Header",
  computed: {
    totalAmount(){
      return this.$root.totalAmount;
    }
  }
}
</script>

<style scoped>

</style>