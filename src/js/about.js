const id = getId();
const url = `/api/get/${id}`;
console.log(url);
fetchProducts(url).then(res => showProductById(res))
    .catch(error => console.log(error));