<?php require_once("../layouts/header.php") ?>
<main>
        <div class="page register">
            <section>
        <div class="old-user">
            <h2>Already a member?</h2>
            <p>then what are you waiting for, we already miss you :)<br>
                <a href="register.php">Return to band</a></p>
        </div>
            </section>
            <section>
                <div class="form register">
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
                                    <label for="email">
                                        Email
                                        <input type="text" class="form-control" placeholder="Enter your email" name="email">
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
                                <div class="col-sm-10">
                                    <label for="confirm-password">
                                        Confirm assword
                                        <input type="password" class="form-control" placeholder="Reenter your password" name="confirm-password">
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
        </div>
</main>
<?php require_once("../layouts/footer.php") ?>
