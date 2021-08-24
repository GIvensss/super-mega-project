const cartProducts = getCart() || {};

if(totalAmount(cartProducts)) {
    for(let key in cartProducts) {
        fetchProducts('/api/get/' + cartProducts[key].id).then(res => showProductInCart(res));
    }
    let node = document.createElement("div");
    node.setAttribute('class', 'row');
    node.innerHTML = totalPrice() + " UAN";
    document.querySelector('.cart').appendChild(node);
}
else {
    document.querySelector('.cart').innerHTML = '<h1>Cart is Empty</h1>'
}
