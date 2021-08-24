<main>
    <div class="cart">
        <section>
            <div class="cart products">
                <div class="row">
                    <div class="col-md-4 offset-md-2">
                        <img src="../../../src/images/waiting.gif" alt="loading....">
                    </div>
                </div>
            </div>
        </section>
        <section class="order-form my-4 mx-4">
            <div class="cart billing-form">
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-12">
                            <h1>Order Form</h1>
                        </div>
                        <form class="postOrder" name="order">
                            <div class="form-group">
                            <div class="col-12">
                                <div class="row mx-4">
                                    <div class="col-12 mb-2">
                                        <label for="firstName" class="order-form-label">Firstname</label>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                                        <input class="order-form-input firstName form-control"
                                               name="fistName" id="firstName" placeholder="Firstname" required>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="lastName" class="order-form-label">Lastname</label>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                                        <input class="order-form-input lastName form-control"
                                               name="lastName" id="lastName" placeholder="Lastname" required>
                                    </div>
                                </div>
                                <div class="row mt-3 mx-4">
                                    <div class="col-12">
                                        <label for="address" class="order-form-label">Address</label>
                                    </div>
                                    <div class="col-12">
                                        <input class="order-form-input address form-control" name="address"
                                               id="address" placeholder="Kharkiv, Pupkina str., 24/1" required>
                                    </div>
                                </div>
                                <div class="row mt-3 mx-4">
                                    <div class="col-12">
                                        <label for="phone" class="order-form-label">Phone number</label>
                                    </div>
                                    <div class="col-12">
                                        <input class="order-form-input phone form-control" name="phone"
                                               id="phone" placeholder="+380999999999" required>
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
                                <div class="row">
                                    <div class="errors">

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button type="submit" id="btnSubmit"
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
    </div>
</main>
<script src="../../../src/js/request.js"></script>
<script src="../../../src/js/cart.js"></script>
<script src="../../../src/js/validation.js"></script>
<script src="../../../src/js/order.js"></script>
<script src="../../../src/js/products.js"></script>
<script src="../../../src/js/cartMain.js"></script>


