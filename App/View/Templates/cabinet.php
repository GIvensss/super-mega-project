<body>
<div class="container">
    <?php if (isset($_SESSION['username'])) : ?>
    <div class="row">
        <div class="col-3">GreeTings,
        <?php echo $_SESSION['username']; ?>
        </div>
    </div>
    <?php endif; ?>
        <div class="col-3">
            <div class="user-menu">
            <nav class="sidebar-sticky bg-light navbar-light navbar-expand-md">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto flex-column">
                        <li class="nav-item active">
                            <a href="" class="nav-link">Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="/cart" class="nav-link">My Cart</a>
                        </li>
                    </ul>
                </div>
            </nav>
            </div>
        </div>
    <h2 >
        Your Orders:
    </h2>
                    <?php foreach ($params as $param) : ?>
                        <div class="row">
                            <div class="col-md-3">ID order: <strong><?php echo $param['id'] ?></strong></div>
                            <div class="col-md-3">Product: <strong><?php echo $param['name'] ?></strong></div>
                            <div class="col-md-3">Amount: <strong><?php echo $param['product_amount'] ?></strong></div>
                            <div class="col-md-3">Price: <strong><?php echo $param['amount_price'] ?> UAN</strong></div>
                            </div>
                    <?php endforeach; ?>
</div>
</body>
</html>
