const id = getId();
const url = `/api/get/${id}`;
console.log(url);
setTimeout(fetchProducts, 1000);
fetchProducts(url).then(res => showProductById(res))
    .catch(error => console.log(error));