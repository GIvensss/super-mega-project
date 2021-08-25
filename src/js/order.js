let order = {
    user: {
        firstName: '',
        lastName: '',
        address: '',
        phone: '',
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

const showValidationError = (idInput, InvMessage) => {
    let input = document.getElementById(idInput);
    input.classList.add('is-invalid');
    let invalidMessageContainer = document.createElement('div');
    invalidMessageContainer.setAttribute('class', 'invalid-feedback');
    invalidMessageContainer.innerHTML = InvMessage;
    input.parentNode.insertBefore(invalidMessageContainer, input.nextSibling);
}

const isEmptyErrors = (invFirstName, invLastName, invAddress, invPhone) => {
    if(
        invFirstName.length > 0
        || invLastName.length > 0
        || invAddress.length > 0
        || invPhone.length > 0
    ) {
        return false;
    } else {
        return true;
    }

}
console.log(typeof JSON.stringify(order));
const showAfterOrder = () => {
    let container = document.querySelector('.cart');
    container.innerHTML = "<div class='row'><h1>the order has been transferred for processing to specialists</h1></div>";
}


const orderForm = document.forms.order;
orderForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const orderData = getOrderData();
    const invFirstName = validateFirstname(orderData.user.firstName);
    const invLastName = validateLastname(orderData.user.lastName);
    const invAddress = validateAddress(orderData.user.address);
    const invPhone = validatePhone(orderData.user.phone);

    if (invFirstName.length !== 0) {
        showValidationError('firstName', invFirstName);
    }
    if (invLastName.length !== 0) {
        showValidationError('lastName', invLastName);
    }
    if (invAddress.length !== 0) {
        showValidationError('address', invAddress);
    }
    if (invPhone.length !== 0) {
        showValidationError('phone', invPhone);
    }
    if(isEmptyErrors(invFirstName, invLastName, invAddress, invPhone)) {
        fetchPost('/api/post-order', orderData)
            .then((response) => {
                console.log("Response: " + response);
                setItemToCart({});
                showAfterOrder();
        })
            .catch((error) => console.error(error));
    }
});

