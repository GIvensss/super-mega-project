<template>
  <section class="order-form my-4 mx-4">
    <div class="cart billing-form">
      <div class="container pt-4">
        <div class="row">
          <div class="col-12">
            <h1>Order Form</h1>
          </div>
          <form class="postOrder" @submit.prevent="placeOrder" name="order">
            <div class="form-group">
              <div class="col-12">
                <div class="row mx-4">
                  <div class="col-12 mb-2">
                    <label for="firstName" class="order-form-label">Firstname</label>
                  </div>
                  <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                    <input v-model="firstName" :class="{ 'form-control': true, 'is-invalid': invMsg.firstNameInvMsg}"
                           name="fistName" id="firstName" placeholder="Firstname" required>
                    <div v-if="invMsg.firstNameInvMsg" class="invalid-feedback">
                      {{invMsg.firstNameInvMsg}}
                    </div>
                  </div>

                  <div class="col-12 mb-2">
                    <label for="lastName" class="order-form-label">Lastname</label>
                  </div>
                  <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                    <input v-model="lastName" :class="{ 'form-control': true, 'is-invalid': invMsg.lastNameInvMsg}"
                           name="lastName" id="lastName" placeholder="Lastname" required>
                    <div v-if="invMsg.lastNameInvMsg" class="invalid-feedback">
                      {{invMsg.lastNameInvMsg}}
                    </div>
                  </div>
                </div>
                <div class="row mt-3 mx-4">
                  <div class="col-12">
                    <label for="address" class="order-form-label">Address</label>
                  </div>
                  <div class="col-12">
                    <input v-model="address" :class="{ 'form-control': true, 'is-invalid': invMsg.addressInvMsg}"
                           name="address" id="address" placeholder="Kharkiv, Pupkina str., 24/1" required>
                    <div v-if="invMsg.addressInvMsg" class="invalid-feedback">
                      {{invMsg.addressInvMsg}}
                    </div>
                  </div>
                </div>
                <div class="row mt-3 mx-4">
                  <div class="col-12">
                    <label for="phone" class="order-form-label">Phone number</label>
                  </div>
                  <div class="col-12">
                    <input v-model="phone" :class="{ 'form-control': true, 'is-invalid': invMsg.phoneInvMsg}"
                           name="phone" id="phone" placeholder="+380999999999" required>
                    <div v-if="invMsg.phoneInvMsg" class="invalid-feedback">
                      {{invMsg.phoneInvMsg}}
                    </div>
                  </div>
                </div>
                <div class="row mt-3 mx-4">
                  <div class="col-12">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input form-control"
                             name="validation" id="validation" value="1" required>
                      <label for="validation" class="form-check-label">
                        I agreee with politika confidencialnosti
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12">
                    <button type="submit"
                            :disabled="!isValid"
                            id="btnSubmit"
                            class="btn btn-dark d-block mx-auto btn-submit">Checkout
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "CartOrderForm",
  data: () => ({
    firstName: "",
    lastName: "",
    city: "",
    address: "",
    email: "",
    phone: "",
    invMsg: {
      firstNameInvMsg: '',
      lastNameInvMsg: '',
      addressInvMsg: '',
      phoneInvMsg: '',
    },
  }),
  watch: {
    firstName(newFirstName) {
      if(newFirstName.length > 20) {
        this.invMsg.firstNameInvMsg = "First name must be less than 20 symb";
      }
      else this.invMsg.firstNameInvMsg = "";
    },
    lastName(newLastName) {
      if(newLastName.length > 20) {
        this.invMsg.lastNameInvMsg = "Last name must be less than 20 symb";
      }
      else this.invMsg.lastNameInvMsg = "";
    },
    address(newAddress) {
      if(newAddress.length > 40) {
        this.invMsg.addressInvMsg = "Address is invalid";
      }
      else if(newAddress[0] !== newAddress[0].toUpperCase()) {
        this.invMsg.addressInvMsg = "Address must start with a Capital letter ";
      }
      else this.invMsg.cityInvMsg = "";
    },
    phone(newPhone) {
      if(!/^\+?\d{10,13}$/.test(newPhone))
        this.invMsg.phoneInvMsg = 'Phone must consist of numbers';
      else {
        this.invMsg.phoneInvMsg = '';
      }
    }
  },
  computed: {
    isValid() {
      for(let i in this.invMsg) {
        if(this.invMsg[i]){
          return false;
        }
      }
      return !(!this.firstName || !this.lastName || !this.address || !this.phone);
    },
  },
  methods: {
    placeOrder() {
      let order = {
        user: {
          firstName: this.firstName,
          lastName: this.lastName,
          address: this.address,
          phone: this.phone,
        },
        products: {
        }
      };
      order.products = this.$root.cart;
      console.log(order);
      this.fetchOrder('/api/post-order', order)
          .then((response) => {
            console.log("Response: " + response);
            this.$root.setLocalStorageCart({});
          })
          .catch((error) => console.error(error));
    },
    async fetchOrder(url, data){
      const response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
      });
      return await response.json();
    }
  }
}
</script>

<style scoped>

</style>