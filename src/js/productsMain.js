const id = getId();
console.log(id);
fetchGet("/api/get/page/" + id).then(res => showProducts(res))
    .catch(error => console.log(error));
