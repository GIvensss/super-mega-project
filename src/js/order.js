let order = {
    user: {
        firstName: "",
        lastName: "",
        address: "",
        phone: "",
    },
    products: {
    }
};

const getOrderData = () => {
    order.user.firstName = document.querySelector('.firstName').value;
    order.user.lastName = document.querySelector('.lastName').value;
    order.user.address = document.querySelector('.address').value;
    order.user.phone = document.querySelector('.phone').value;
    order.products = getCart();
    return order;
}


const orderForm = document.forms.order;
orderForm.addEventListener('submit', function (e) {
    e.preventDefault();
        fetchOrder('/api/post-order', getOrderData()).then((response) => {
            console.log(response);
            orderForm.reset();
        })
            .catch((err) => console.error(err))
});

