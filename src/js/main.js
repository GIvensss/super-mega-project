fetchGet("/api/get/page/1").then(res => showProducts(res))
    .catch(error => console.log(error));
