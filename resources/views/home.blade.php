<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header container-fluid bg-dark justify-content-center align-items-center text-light">
    <div class="row justify-content-center align-items-center d-flex">
        <div class="col-3 mt-3">
            <a href="/" class="navbar-brand mt-3">
                <img class="rounded-4 smaller" src="img/iconsHomePage/icon.png" alt="logo picture" title="picture of our logo" height="85">
            </a>
        </div>
        <div class="col-4 h4 mt-4">
            <nav class=" navbar navbar-dark bg-dark">
                <div class="container-fluid navSize">
                    <ul class="navbar-nav d-flex flex-row align-items-center">
                        <li class="nav-item" style="margin-right: 14px;">
                            <a href="/" class="nav-link" aria-current="page">
                                <p class="text-warning mobileBiggerLink">Home</p>
                            </a>
                        </li>
                        <li class="nav-item mr-8">
                            <a href="/products" class="nav-link">
                                <p class="mobileBiggerLink customColor">
                                    Products
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-xl-5 col-lg-6 pt-5"  >
            <div class="row ms-5">
                <div class="col-8">
                    <div class="input-group footerSub footerForm ">
                        <livewire:search-products/>
                    </div>
                </div>
                <div class="col-4 justify-content-end">
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item">
                            <a href="/login" class="navbar-brand">
                                <img src="img/iconsHomePage/login.png" alt="" height="60">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/shoppingCart" class="navbar-brand">
                                <img src="img/iconsHomePage/icons8-cart-64.png" alt="" height="69">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
             <!-- BODY -->
    <section class="bg-dark p-5 text-light text-center">
        <div class="container-fluid">
            <div class="row d-md-flex align-items-center">
                <div class="col-lg-4 col-md-11 text-start">
                    <h1 class="headline ">Welcome to <span class="text-warning">TeeTe Clothing</span></h1>
                    <h3 class="text-warning mobileBiggerHeadline">T-shirts</h3>
                    <h3 class="text-warning mobileBiggerHeadline">Sweatshirts</h3>
                    <p class="lead my-4 mobileBigger">
                        Discover the perfect blend of style and affordability with
                        our collection of trendy t-shirts and cozy sweatshirts. Enjoy fast delivery and
                        unbeatable prices as you shop your favorite looks today!
                    </p>
                </div>
                <div class=" col-lg-8 d-none d-lg-block justify-content-end" >
                    <img src="img/productsHomePage/intro.png" class="img-fluid d-none d-lg-block rounded-5" alt="homepage-img with logo and products" width="1000">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid text-dark">
            <div class="row text-center">
                <h1 class="headline2"><span class="text-warning">Featured Products</span></h1>
                <h1 class="pb-5">items from new collection</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-8">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active c-item">
                                <img class="d-block w-100 c-img" src="img/productsHomePage/shirt5.jpg" alt="Product image first slide">
                            </div>
                            <div class="carousel-item c-item">
                                <img class="d-block w-100 c-img" src="img/productsHomePage/shirt3.jpg" alt="Product image second slide">
                            </div>
                            <div class="carousel-item c-item">
                                <img class="d-block w-100 c-img" src="img/productsHomePage/shirt4.jpg" alt="Product image third slide">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <img src="img/prev_icon.jpg" width="40" alt="icon left arrow">
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <img src="img/next_icon.jpg" width="40" alt="icon right arrow">
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block text-end pe-5 ">
                    <h1><span class="text-warning fw-bold mobileBiggerHeadline">Cheap</span></h1>
                    <h1><span class="text-warning fw-bold mobileBiggerHeadline">Elegant</span></h1>
                    <h1><span class="text-warning fw-bold mobileBiggerHeadline">Top-Quality</span></h1>
                    <p class="h2">
                        Step into comfort and style with our versatile range of shirts. Whether you prefer
                        the laid-back vibe of a tee or the coziness of a sweatshirt, find your perfect match
                        here. Explore our curated collection and redefine casual fashion today
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section >
        <div id="feature" class= "justify-content-center container-fluid bg-dark text-light">
            <div class="row m-5 justify-content-center padding10">
                <div class="fe-box">
                    <div class="row">
                        <img src="img/iconsHomePage/iconship.png" alt="icon free shipping">
                    </div>
                    <div class="row align-items-end">
                        <h5 class="bg-yellow rounded-3  pb-2 pt-2 ps-1 pe-1 text-dark">Free Delivery</h5>
                    </div>
                </div>
                <div class="fe-box ">
                    <img src="img/iconsHomePage/iconord.png" alt="icon order paper">
                    <h5 class=" rounded-3  p-2  text-dark bg-white">Online Orders</h5>
                </div>
                <div class="fe-box ">
                    <img src="img/iconsHomePage/iconpig.png" alt="icon piggie bank">
                    <h5 class="rounded-3 mt-3 p-2 bg-white text-dark">Cheap</h5>
                </div>
                <div class="fe-box">
                    <img src="img/iconsHomePage/iconprom.png" alt="icon promotion" class="mt-1">
                    <h5 class="bg-yellow rounded-3 mt-4 p-2 text-dark">Promo</h5>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid text-dark">
            <div class="row align-items-center">
                <div class="col-lg-4 d-none d-lg-block text-start ps-5">
                    <p class="text-warning fw-bold mobileBiggerHeadline">Cozy</p>
                    <p class="text-warning fw-bold mobileBiggerHeadline">Warm</p>
                    <p class="text-warning fw-bold mobileBiggerHeadline">Comfy</p>
                    <p class="h2 text-dark">
                        Embrace warmth and fashion with our collection of hoodies. From chilly mornings to
                        cozy evenings, our hoodies offer both comfort and style. Explore our diverse selection
                        and elevate your wardrobe with ease and flair!
                    </p>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div id="carouselExampleControl2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active c-item">
                                <img class="d-block w-100 c-img" src="img/productsHomePage/hoodie1.png" alt="Product image first slide">
                            </div>
                            <div class="carousel-item c-item">
                                <img class="d-block w-100 c-img" src="img/productsHomePage/hoodie2.png" alt="Product image second slide">
                            </div>
                            <div class="carousel-item c-item">
                                <img class="d-block w-100 c-img" src="img/productsHomePage/hoodie3.png" alt="Product image third slide">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControl2" data-bs-slide="prev">
                            <img src="img/prev_icon.jpg" width="40" alt="icon left arrow">
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControl2" data-bs-slide="next">
                            <img src="img/next_icon.jpg" width="40" alt="icon right arrow">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
         <!-- FOOTER  -->
    <!-- FOOTER  -->
    <footer class="container-fluid bg-dark text-light align-items-center pb-5">
        <div class="row justify-content-evenly">
            <div class="col-6 ms-5 mt-5">
                <h1 class="footerBigText"><span class="text-warning">Stay Teeted!</span></h1>
                <div class="input-group footerSub footerForm">
                    <input id="formEmail" type="text" class="form-control" placeholder="enter your e-mail" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <img src="img/iconsHomePage/right-arrow.jpg" alt="icon right arrow" width="40px">
                        </button>
                    </div>
                </div>
                <h4 class="mb-4 ms-5 mobileBiggerSmall">subscribe to our news with your email :)</h4>
                <h2 class="mb-3 mobileBigger text-warning">Follow Us</h2>
                <div class="row w-40">
                    <div class="col mb-5 ms-3">
                        <img width="30" src="img/iconsHomePage/instagram-white-icon.png" alt="icon instagram">
                        <img width="30" src="img/iconsHomePage/tiktok-round-white-icon.svg" alt="icon tiktok">
                        <img width="30" src="img/iconsHomePage/threads-white-icon.svg" alt="icon threads">
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <img src="img/iconsHomePage/pays.png" alt="icons payment methods" width="205">
                    </div>
                </div>
                <h5 class="mb-2 mobileBiggerSmall">Copyright © 2024 TeeTe</h5>
                <h5 >Website done by Ivácek and Nagy</h5>
            </div>
            <div class="col-4 text-center">
                <h2 class="mb-3 mt-5 morbileBigger text-warning">Products</h2>
                <h5 class="mobileBiggerSmall">T-shirts</h5>
                <h5 class="mb-5 mobileBiggerSmall">Sweatshirts</h5>
                <h2 class="mb-3 mobileBigger text-warning">Help</h2>
                <h5 class="mobileBiggerSmall">Privacy Policy</h5>
                <h5 class="mb-5 mobileBiggerSmall">Terms & conditions</h5>

                <h2 class="mb-3 mobileBigger text-warning">Contact</h2>
                <h5 class="mobileBiggerSmall">teete@teete.tee</h5>
                <h5 class="mobileBiggerSmall">+333 333 333</h5>
            </div>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
