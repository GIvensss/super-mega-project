<main>
        <div class="page register">
            <section>
        <div class="old-user">
            <h2>Already a member?</h2>
            <p>then what are you waiting for, we already miss you :)<br>
                <a href="/auth">Return to band</a></p>
        </div>
            </section>
            <section>
                <div class="form register">
                    <h2>Registration</h2>
                    <p>For new users</p>
                    <form class="form-horizontal" action="" role="form" method="POST">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="login">
                                        Username
                                        <input type="text" class="form-control" placeholder="Enter your username" name="username">
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
                                        Confirm password
                                        <input type="password" class="form-control" placeholder="Reenter your password" name="confirm">
                                    </label>
                                </div>
                            </div>
                            <?php if (isset($params)) : ?>
                                <?php foreach ($params as $param) : ?>
                                    <div style="color:#570134">
                                        <?php echo $param; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
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
