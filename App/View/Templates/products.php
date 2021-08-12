<main>
    <div class="main">
        <section>
            <div class="interesting">
                <img src="../../../templates/images/banner1.jpg">
                <h1>Store opening. Discounts up to 30%</h1>
                <p>
                    In honor of the opening of the store,
                    we offer you discounts on goods from
                    the T-shirts, bracelets, rings
                </p>
            </div>
        </section>
        <section>
            <div class="main-cards">
                <div class="cards popular">
                    <h3>Popular: be always in trend</h3><br>
                    <?php foreach ($params as $param) : ?>
                    <a href="/products/<?= $param['id'] ?>">
                        <div class="product-card popular">
                            <div class="image-wrapper">
                                <div class="primary-image">
                                    <img src="/templates/images/skillet.jpeg" alt="rock-shirt">
                                </div>
                                <div class="secondary-image"></div>
                            </div>
                            <div class="product-card-name">
                                <?php echo $param['name']; ?>
                            </div>
                            <div class="product-card-description">
                                <?php echo $param['description'] ?>
                            </div>
                            <div class="button add-to-cart">
                                <form method="get">
                                    <input type="button" class="add-to-cart" value="<?php echo $param['price'] ?> UAN">
                                </form>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>

            <div class="cards new">
                <h3>New: amaze everyone with your eccentricity</h3><br>
            </div>
            </div>
        </section>
    </div>
</main>