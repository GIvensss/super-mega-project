<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../src/css/card.css">
    <link rel="stylesheet" href="../../../src/css/menu.css">
    <link rel="stylesheet" href="../../../src/css/footer.css">
    <link rel="stylesheet" href="../../../src/css/header.css">
    <link rel="stylesheet" href="../../../src/css/auth.css">
    <link rel="stylesheet" href="../../../src/css/about.css">
    <link rel="stylesheet" href="../../../src/css/cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&family=Qahiri&family=Roboto+Condensed:ital
    ,wght@0,300;0,400;1,300;1,700&family=Zen+Loop&display=swap" rel="stylesheet">
    <title>Store</title>
</head>
<body>
<header>
    <div class="ceiling">
        <div class="row">
            <div class="col-md-4">
        <a href="/">
            <img class="main-icon" src="../../../src/images/rock-symbol.svg" alt="rock-ico">
        </a>
            </div>
            <div class="col-md-4 offset-md-4">
                <a href="/cart">
                    <img class="basket-icon" src="../../../src/images/basket.svg" alt="basket">
                    <span class="badge bg-secondary mx-2 cartProductAmount">
                        0
                    </span>
                </a>
                <?php if (isset($_SESSION['username'])) : ?>
                    <a href="/cabinet/index">
                        <img class="cabinet-icon" src="../../../src/images/punk.png" alt="cabinet">
                    </a>
                    <a href="/auth/logout">
                        <img class="logout-icon" src="../../../src/images/log-out.png" alt="logout">
                    </a>
                <?php else : ?>
                    <a href="/auth">
                        <img class="cabinet-icon" src="../../../src/images/punk.png" alt="cabinet">
                    </a>
                <?php endif; ?>

            </div>
        </div>
        <div class="row">
                <div class="col-md-4 offset-md-2">
                    <input type="search" class="search" name="q" placeholder="Search">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="search" value="Search">Search</button>
                </div>
        </div>
    </div>
    <div class="row">
        <nav>
            <div class="menu">
                <ol class="menu">
                    <li>Categories</li>
                    <li>Bands</li>
                    <li>About</li>
                    <li>Feedback</li>
                </ol>
            </div>
        </nav>
    </div>
</header>
