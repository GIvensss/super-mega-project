<div class="product-card new">
    <div class="image-wrapper">
        <div class="primary-image">
            <img src="/templates/images/acdc.jpeg" alt="rock-shirt">
        </div>
        <div class="secondary-image"></div>
    </div>
    <div class="product-card-name">
        <?php echo $name; ?>
    </div>
    <div class="product-card-description">
        <?php echo $description ?>
    </div>
    <div class="button add-to-cart">
        <form method="get">
            <input type="button" class="add-to-cart" value="<?php echo $price; ?> UAN">
        </form>
    </div>
</div>
