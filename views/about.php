<?php require_once("../layouts/header.php"); ?>
<main>
    <section>
        <div class="about-product">
            <img src="/templates/images/acdc.jpeg" alt="product">
            <div class="rating-area">
                <input type="radio" id="star-5" name="rating" value="5">
                <label for="star-5" title="Оценка «5»"></label>
                <input type="radio" id="star-4" name="rating" value="4">
                <label for="star-4" title="Оценка «4»"></label>
                <input type="radio" id="star-3" name="rating" value="3">
                <label for="star-3" title="Оценка «3»"></label>
                <input type="radio" id="star-2" name="rating" value="2">
                <label for="star-2" title="Оценка «2»"></label>
                <input type="radio" id="star-1" name="rating" value="1">
                <label for="star-1" title="Оценка «1»"></label>
            </div>
            <h1>Name of Product</h1>
            <span class="category">Category</span>
            <span class="detail description">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </span>
            <span class="price"><strong>XX.XX UAN</strong></span>
            <form class="add-to-cart">
                <button type="submit" class="add-to-cart">Add to cart</button>
            </form>
        </div>
    </section>
</main>
<?php require_once("../layouts/footer.php"); ?>