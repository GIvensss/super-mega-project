<template>
  <div class="row">
    <nav>
      <div class="menu">
        <div class="dropdown">
          <button class="dropbtn">Categories</button>
          <div class="dropdown-content">
            <a v-for="category in categories" :key="category.id" :href="'/products/category/'+category.id">
              {{category.name}}
            </a>
          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn">Bands</button>
          <div class="dropdown-content">
            <a v-for="band in bands" :key="band.id" :href="'/products/band/'+ band.id">
              {{band.name}}
            </a>

          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn">Feedback</button>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>

export default {
  name: "Menu",
  data: () => ({
    categories: [],
    bands: [],
  }),
  mounted() {
    this.fetchBands();
    this.fetchCategories();
  },
  methods: {
    async fetchBands() {
      const response = await fetch('/api/get/bands');
      this.bands = await response.json();
    },
    async fetchCategories() {
      const response = await fetch('/api/get/categories');
      this.categories = await response.json();
    }
  }
}
</script>

<style scoped>

.dropbtn {
  background-color: #320924;
  color: white;
  padding: 8px;
  margin-left: 100px;
  margin-right: 100px;
  font-size: 21px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 220px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}


.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #210618;}
</style>