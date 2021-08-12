
<!--<main>-->
<!--    <section>-->
<!--        <div class="cart">-->
<!--            <h1>Your cart</h1>-->
            <div class="product selected">
                <img src="/templates/images/acdc.jpeg" alt="image of selected product">
                <span class="product name"><strong><?php echo $name ?></strong></span><br>
                <span class="product price"><?php echo $price ?> UAN</span><br>
                <div class="product number">
                    <button>-</button>
                    <span class="number">1</span>
                    <button>+</button>
                </div><br>
                <div class="product size">
                    <input type="radio" id="S" name="size" value="S">
                    <label for="S">S</label>
                    <input type="radio" id="M" name="size" value="M">
                    <label for="M">M</label>
                    <input type="radio" id="L" name="size" value="L">
                    <label for="L">L</label>
                    <input type="radio" id="XL" name="size" value="XL">
                    <label for="XL">XL</label>
                </div><br>
            </div>
    </section>
</main>

