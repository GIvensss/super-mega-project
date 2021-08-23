fetchProducts("/api/get").then(res => showProducts(res))
    .catch(error => console.log(error));
