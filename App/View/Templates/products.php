<main>
    <div class="container">
    <div class="main">
        <section>
            <div class="main-cards">
                            <!-- PLACE FOR PRODUCTS -->
                        <?php  foreach ($params as $param) : ?>
                        <div class="product-card popular">-->
                            <a href="/products/<?= $param['id'] ?>">
                                <div class="product image">
                                    <img class="product image" src="/<?= $param['image_src'] ?>" alt="rock-shirt">
                                </div>
                            </a>
                            <div class="product-card-name">
                                <?= $param['name'] ?>
                            </div>
                            <div class="product-card-description">
                                <?= $param['description'] ?>
                            </div>
                            <div class="button add-to-cart">
                                <button class="add-to-cart" value="UAN"><?= $param['price'] ?> UAN</button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</main>
<!--                <div class="cards popular">-->
<!--                    <h3>Popular: be always in trend</h3><br>-->
<!--                    <a href="/products/">-->
<!--                        <div class="product-card popular">-->
<!--                            <div class="image-wrapper">-->
<!--                                <div class="primary-image">-->
<!--                                    <img src="/templates/images/skillet.jpeg" alt="rock-shirt">-->
<!--                                </div>-->
<!--                                <div class="secondary-image"></div>-->
<!--                            </div>-->
<!--                            <div class="product-card-name">-->
<!--                            </div>-->
<!--                            <div class="product-card-description">-->
<!--                            </div>-->
<!--                            <div class="button add-to-cart">-->
<!--                                    <input type="button" class="add-to-cart" value="UAN">-->
<!--                                </form>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </a>-->
