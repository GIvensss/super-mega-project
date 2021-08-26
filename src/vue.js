import {createApp} from 'vue';
import "bootstrap/dist/js/bootstrap.bundle.min";

import ProductsList from "./js/components/products/ProductsList";
import ProductAbout from "./js/components/products/ProductAbout";
import Header from "./js/components/header/Header";
import Cart from "./js/components/cart/Cart";
const app = createApp({
    data: () => ({
        cart: []
    }),
    computed: {
        totalAmount() {
            return this.cart.reduce((res, next) => res + next.amount, 0);
        },
        totalPrice() {
            return this.cart.reduce((res, next) => res + (next.amount * next.price), 0);
        },
    },
    mounted() {
        const localStorageCart = this.getLocalStorageCart();
        for (let key in localStorageCart) {
            this.cart.push(localStorageCart[key]);
        }
    },
    methods: {
        getLocalStorageCart(){
            return JSON.parse(localStorage.getItem('cart')) || {};
        },
        setLocalStorageCart(cart){
            localStorage.setItem('cart', JSON.stringify(cart));
        },
        isEmptyCart(){
            return this.cart.length === 0;
        },
        addToCart(product) {
            this.cart.push({...product, amount: 1});
            this.setLocalStorageCart(this.cart);
        },
        isSetInCart(id) {
            return !!this.cart.find(item => item.id === id);
        },
        incrementAmount(index) {
            const product = this.cart[index];
            this.cart.splice(index, 1, {...product, amount: product.amount + 1});
            this.setLocalStorageCart(this.cart);
        },
        decrementAmount(index) {
            const product = this.cart[index];
            this.cart.splice(index, 1, {...product, amount: product.amount - 1});
            this.setLocalStorageCart(this.cart);
        },
        removeProduct(index) {
            this.cart.splice(index, 1);
            this.setLocalStorageCart(this.cart);
        }
    }
});
app.component('products-list', ProductsList);
app.component('product-about', ProductAbout);
app.component('cart', Cart);
app.component('header-component', Header);
app.mount('#app');