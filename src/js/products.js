const showProducts = ((products) => {
    const container = document.querySelector(".main-cards");
    let result = '';
    for (let i in products) {
        result += `<div class = "product-card popular"><div class = "image-wrapper">`;
        result += `<a href = "/products/${products[i].id}">`;
        result += `<div class = "primary-image"><img class="img-responsive center-block image product" src = "../../src/images/${products[i].image_src}" alt = "product"></div></div>`;
        result += `</a><div class = "product-card-name">${products[i].name}</div>`;
        result += `<div class = "product-card-description">${products[i].description}</div>`;
        result += `<div class = "button add-to-cart"><button onclick="addToCart(this)" class = "add-to-cart"`;
        if(isSetProductInCart(products[i].id)){
            result += ` disabled`;
        }
        result += ` data-id="${products[i].id}" data-price="${products[i].price}">${products[i].price} UAN</button></div>`;
        result += `</div>`;
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
    result += `<button onclick="addToCart(this)" class="add-to-cart">Add to cart</button>`;
    container.innerHTML = result;
}
const showProductInCart = (product) => {
    const container = document.querySelector(".cart.products");
    const node = document.createElement('div');
    node.setAttribute('class', 'product selected');
    let result = '';
    result += `<div class="row"><div class="col-md-4">`
    result += `<img src="../../src/images/${product.image_src}" alt="selected product"></div>`;
    result += `<div class="col-md-6"><span class="product name"><strong>${product.name}</strong></span><br>`;
    result += `<span class="product price">${product.price} UAN</span><br>`;
    result += `<div class="product">`;
    result += `<button onclick="decrementProduct(this, ${product.id})">-</button>`;
    result += `<span class="amount">${productAmount(product.id)}</span>`;
    result += `<button onclick="incrementProduct(this, ${product.id})">+</button>`;
    result += `</div><br>`;
    result += `<div class="product size">`;
    result += `<input type="radio" id="S" name="size" value="S">`;
    result += `<label for="S">S</label>`;
    result += `<input type="radio" id="M" name="size" value="M">`;
    result += `<label for="M">M</label>`;
    result += `<input type="radio" id="L" name="size" value="L">`;
    result += `<label for="L">L</label>`;
    result += `<input type="radio" id="XL" name="size" value="XL">`;
    result += `<label for="XL">XL</label></div></div>`;
    result += `<div class="col-md-1"><button data-id="${product.id}" onclick="removeProduct(this, ${product.id})" type="button" class="close" aria-label="Close">`;
    result += `<span aria-hidden="true">&times;</span></button></div>`;
    result += `</div>`;
    node.innerHTML = result;
    container.appendChild(node);
}

