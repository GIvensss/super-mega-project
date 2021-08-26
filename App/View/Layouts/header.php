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
<div id="app">
    <header-component is-auth='<?= \App\Service\Authentication::isAuth() ?>'></header-component>
