const showProducts = ((products) => {
    const container = document.querySelector(".main-cards");
    let result = '';
    for (let i in products) {
        result += `<a href = "/products/${products[i].id}">`;
        result += `<div class = "product-card popular"><div class = "image-wrapper">`;
        result += `<div class = "primary-image"><img class="img-responsive center-block image product" src = "../../src/images/${products[i].image_src}" alt = "product"></div></div>`;
        result += `<div class = "product-card-name">${products[i].name}</div> `;
        result += `<div class = "product-card-description">${products[i].description}</div>`;
        result += `<div class = "button add-to-cart"><button class = "add-to-cart">${products[i].price} UAN</button></div>`
        result += `</div></a>`;
    }
    container.innerHTML = result;
});
const showProductById = (product) => {
    const container = document.querySelector(".about-product");
    let result = '';
    result += `<img src="../../src/images/${product.image_src}" alt="product">`;
    result += `<h1>${product.name}</h1>`;
    if(product.band != null)
        result += `<span class="category"><strong>${product.band}</strong></span><br>`;
    result += `<span class="category"><strong>${product.category}</strong></span><br>`;
    result += `<span class="detail description"><p>${product.description}</p>`;
    result += `<span class="price"><strong>${product.price} UAN</strong></span><br>`;
    result += `<button class="add-to-cart">Add to cart</button>`;
    container.innerHTML = result;
}


