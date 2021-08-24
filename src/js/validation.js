const validateFirstname = (firstName) => {
    let error = []
    if(firstName.length > 20 || firstName.length < 3) {
        error.push("Firstname cannot be more than 20 symbols or less than 3 symbols");
    }
    if(!/^[A-Za-z]+$/.test(firstName)){
        error.push("Firstname must consist of the Latin letters");
    }
    return error;
}

const validateLastname = (lastName) => {
    let error = []
    if(lastName.length > 20 || lastName.length < 3) {
        error.push("Lastname cannot be more than 20 symbols or less than 3 symbols");
    }
    if(!/^[A-Za-z]+$/.test(lastName)){
        error.push("Lastname must consist of the Latin letters");
    }
    return error;
}

const validateAddress = (address) => {
    let error = [];
    if(address.length > 100 || address.length < 10) {
        error.push("Address cannot be more than 100 symbols or less than 10 symbols");
    }
    return error;
}

const validatePhone = (phone) => {
    let error = [];
    if(phone.length > 14 || phone.length < 10) {
        error.push("The phone number cannot be more than 14 symbols or less than 10");
    }
    if(!/^\+?\d{10,13}$/.test(phone)) {
        error.push("The phone number must consist of numbers(optional with + at the start)");
    }
    return error;
}