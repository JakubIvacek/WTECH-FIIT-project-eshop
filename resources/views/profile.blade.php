<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
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
        <div class="col-xl-5 col-lg-6">
            <div class="row ms-5">
                <div class="col-8">
                    <div class="input-group footerSub footerForm">
                        <input id="formSearch" type="text" class="form-control" placeholder="enter search" aria-label="Search query" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <img src="img/iconsHomePage/right-arrow.jpg" alt="icon" width="40px">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-4 justify-content-end">
                    <ul class="navbar-nav flex-row ">
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
<!--BODY-->
<div class="container">
    <div id="feature" class="justify-content-center container-fluid  text-dark">
        <div class="row m-5 justify-content-center padding10">
                <div class="fe-box">
                    <a href="{{ route('logout') }}">
                        <img src="img/iconsProfile/logout.png">
                    </a>
                    <div class="row align-items-end">
                        <h2 class="text-center">Logout</h2>
                    </div>
                </div>
            <div class="fe-box">
                <a href="/profileChange" >
                    <img src="img/iconsProfile/settings.png">
                </a>
                <div class="row align-items-end">
                    <h2 class="text-center">Settings</h2>
                </div>
            </div>
            <div class="fe-box">
                <a href="/orders" >
                    <img src="img/iconsProfile/shopping-bag.png">
                </a>
                <div class="row align-items-end">
                    <h2 class="text-center">Orders</h2>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- FOOTER  -->
    <footer class="container-fluid bg-dark text-light align-items-center pb-5">
        <div class="row justify-content-evenly">
            <div class="col-6 ms-5 mt-5">
                <h1 class="footerBigText"><span class="text-warning">Stay Teeted!</span></h1>
                <div class="input-group footerSub footerForm">
                    <input id="formEmail" type="text" class="form-control" placeholder="enter your e-mail"
                           aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                <h5>Website done by Ivácek and Nagy</h5>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

</body>

</html>
