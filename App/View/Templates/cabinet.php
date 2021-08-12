<body>
<div class="container">
    <?php if (isset($_SESSION['login'])) : ?>
    <div class="row">
        <div class="col-3">GreeTings,
        <?php echo $_SESSION['login']; ?>
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
                            <a href="" class="nav-link">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">My Cart</a>
                        </li>
                    </ul>
                </div>
            </nav>
            </div>
        </div>
    </div>
</div>
</body>
</html>
