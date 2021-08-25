const id = getId();
const url = `/api/get/${id}`;
fetchGet(url).then(res => showProductById(res))
    .catch(error => console.log(error));