
const getCart = () => {
  return JSON.parse(localStorage.getItem('cart'));
};

const getItemFromCart = (item) => {
    return getCart()[item];
};

const setItemToCart = (item) => {
    localStorage.setItem('cart', JSON.stringify(item));
};

const addToCart = (item) => {
    let cart = getCart() || {};
    const id = item.getAttribute("data-id");
    const price = item.getAttribute("data-price");
    cart["id_" + id] = {
        id: id,
        price: price,
        amount: 1
    };
    document.querySelector('.cartProductAmount').innerHTML = String(totalAmount(cart));

    setItemToCart(cart);
    item.disabled = true;
};

const isSetProductInCart = (id) => {
     if(!getCart()) return false;
    return !!(getCart().hasOwnProperty(id));
};

const productAmount = (id) => {
    let cart = getCart() || {};
    return cart['id_' + id].amount;
}

const totalAmount = () => {
    let count = 0;
    let cart = getCart();
    for(let key in cart) {
            count += Number(cart[key].amount);
    }
    return count;
};

const totalPrice = () => {
    let sum = 0;
    let cart = getCart();
    for(let key in cart) {
        sum += Number(cart[key].amount) * Number(cart[key].price);
    }
    return sum;
};

const incrementProduct = (item, id) => {
    let cart = getCart();
    let prev = item.previousElementSibling;
    setItemToCart(cart);
    if(cart["id_" + id].amount < 15) {
        prev.innerHTML = String(++cart["id_" + id].amount);
        setItemToCart(cart);
    }
    else {
        throw new RangeError("The amount of products cannot be more than 15");
    }
};
const decrementProduct = (item, id) => {
    let next = item.nextElementSibling;
    let cart = getCart();
    if(cart["id_" + id].amount > 1) {
        next.innerHTML = String(--cart["id_" + id].amount);
        setItemToCart(cart);
    }
    else {
        throw new RangeError("The amount of products cannot be less than 1");
    }
};
const removeProduct = (item, id) => {
    let cart = getCart();
    let container = item.parentElement.parentElement.parentElement;
    delete cart["id_" + id];
    setItemToCart(cart);
    container.remove();
    if(Object.keys(cart).length === 0) {
        document.querySelector('.cart').innerHTML = '<h1>Cart is Empty</h1>'
    }
};
let cart = getCart();
document.querySelector('.cartProductAmount').innerHTML = String(totalAmount(cart));

