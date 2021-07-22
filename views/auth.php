<?php require_once("../layouts/header.php") ?>
<main>
    <section>
        <div class="new-user">
            <h2>First time?</h2>
            <p>then hurry up and join our community. We're counting on you!<br>
                <a href="register.php">Register now</a></p>
        </div>
        <div class="form auth">
            <h2>Authentication</h2>
            <p>For regular users</p>
            <form class="form-horizontal" action="products.php" role="form" method="POST">
                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label for="login">
                                Login
                                <input type="text" class="form-control" placeholder="Enter your login" name="login">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label for="password">
                                Password
                                <input type="password" class="form-control" placeholder="Enter your password" name="password">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default btn-sm">Enter</button>
                        </div>
                    </div>
            </form>
        </div>
    </section>
</main>
<?php require_once("../layouts/footer.php") ?>
