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
                            <a href="/cabinet/orders" class="nav-link">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">My Cart</a>
                        </li>
                    </ul>
                </div>
            </nav>
            </div>
        </div>
                    <?php foreach ($params as $param) : ?>
                        <div class="row">
                            <div class="col-md-3">ID order:
                                <strong><?php echo $param['order_id'] ?></strong>
                            </div>
                            <div class="col-md-3">Products Amount :
                                <strong><?php echo $param['total_products'] ?></strong>
                            </div>
                            <div class="col-md-3">Total Price:
                                <strong><?php echo $param['total_price']?> UAN</strong>
                            </div>
                        </div>
                    <?php endforeach; ?>
</div>
</body>
</html>
