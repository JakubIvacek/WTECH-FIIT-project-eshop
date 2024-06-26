<!-- resources/views/components/product.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<!-- HEADER -->
<header class="header container-fluid bg-dark justify-content-center align-items-center text-light">
    <div class="row justify-content-center align-items-center d-flex">
        <div class="col-3 mt-3">
            <a href="/" class="navbar-brand mt-3">
                <img class="rounded-4 smaller" src="img/iconsHomePage/icon.png" alt="" height="85">
            </a>
        </div>
        <div class="col-4 h4 mt-4">
            <nav class=" navbar navbar-dark bg-dark">
                <div class="container-fluid navSize">
                    <ul class="navbar-nav d-flex flex-row align-items-center">
                        <li class="nav-item" style="margin-right: 14px;">
                            <a href="/" class="nav-link" aria-current="page">
                                <p class="customColor mobileBiggerLink">Home</p>
                            </a>
                        </li>
                        <li class="nav-item mr-8">
                            <a href="/products" class="nav-link">
                                <p class="mobileBiggerLink text-warning">
                                    Products
                                </p>
                            </a>
                        <li class="nav-item mr-8">
                            <p class="mobileBiggerLink text-warning">
                            </p>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-xl-5 col-lg-6 pt-5">
            <div class="row ms-5">
                <div class="col-8">
                    <div class="input-group footerSub footerForm">
                        <livewire:search-products/>
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


<section class="bg-dark text-light pt-5 pb-3 container-fluid">
    <div class="row align-items-end pe-3">
        <div class="col-6  ">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <ul class=" navbar-nav justify-content-between ps-4 pb-1 text-start ps-5">
                        <li class="">
                            <a href="#" onclick="changeToAll()" class=" fw-bold bg-transparent width100 border-end-0 mobileBiggerLink customColor text-warning specialSize">
                                All
                            </a>
                        </li>
                        <li class="">
                            <a href="#" onclick="changeToShirts()" class="fw-bold mobileBiggerLink specialSize customColor text-warning bg-transparent ">
                                T-shirts
                            </a>
                        </li>
                        <li class="">
                            <a href="#" onclick="changeToSweatshirts()" class="fw-bold mobileBiggerLink specialSize customColor text-warning bg-transparent width100">
                                Sweatshirts
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler pt-2 categoriesHover borderCss" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mb-2"></span>
                        <span class="h3 text-start">Categories</span>
                    </button>

                </div>
            </nav>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-end">
            <select class="w-50 text-dark md-4 fw-bold biggerForm form-select" id="selectOrder" aria-label="Default select example">
                <option selected>Select Sort</option>
                <option value="1">Price Lowest-Highest</option>
                <option value="2">Price Highest-Lowest</option>
                <option value="3">Alphabetical by name A-Z</option>
            </select>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row text-start align-items-center">
            <div class="col-8">
                <div class="row ps-3">
                    <div class="row">
                        <p class="form-label  h1 text-dark  fw-bold">FILTERS</p>
                    </div>
                    <div class="col-6 align-items-start">
                        <div class="row">
                            <select class="w75 text-dark md-4 fw-bold biggerForm form-select" id="selectSize" aria-label="Default select example">
                                <option selected>Select Size</option>
                                <option value="1">S</option>
                                <option value="2">M</option>
                                <option value="3">L</option>
                                <option value="4">XL</option>
                                <option value="5">All</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <select class="w75 text-dark md-4 fw-bold biggerForm form-select" id="selectColor" aria-label="Default select example">
                            <option selected>Select Color</option>
                            <option value="1">Black</option>
                            <option value="2">Red</option>
                            <option value="3">White</option>
                            <option value="4">Blue</option>
                            <option value="5">Other</option>
                            <option value="6">All</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <label for="priceRange"></label>
                <input id="priceRange" type="range" class="h5 text-warning form-range price-range" min="0" max="500" value="0">
                <p class="text-dark md-4 fw-bold h4">Range - 0€ - <span id="selectedPrice">0</span> €</p>
                <button onclick="filterPrice()" class="pt-2 pb-2 bg-transparent width100 borderCssDark">
                    <span class="text-dark md-4 fw-bold h4">Filter price</span>
                </button>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="border-dark height1000 col-12 antialiased"  id="cardContainer">
                <div>
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER  -->
<footer class="container-fluid bg-dark text-light align-items-center pb-5">
    <div class="row justify-content-evenly">
        <div class="col-6 ms-5 mt-5">
            <h1 class="footerBigText"><span class="text-warning">Stay Teeted!</span></h1>
            <div class="input-group footerSub footerForm">
                <input id="formEmail" type="text" class="form-control" placeholder="enter your e-mail" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <img src="img/iconsHomePage/right-arrow.jpg" alt="icon" width="40px">
                    </button>
                </div>
            </div>
            <h4 class="mb-4 ms-5 mobileBiggerSmall">subscribe to our news with your email :)</h4>
            <h2 class="mb-3 mobileBigger text-warning">Follow Us</h2>
            <div class="row w-40">
                <div class="col mb-5 ms-3">
                    <img width="30" src="img/iconsHomePage/instagram-white-icon.png" alt="icon">
                    <img width="30" src="img/iconsHomePage/tiktok-round-white-icon.svg" alt="icon">
                    <img width="30" src="img/iconsHomePage/threads-white-icon.svg" alt="icon">
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">
                    <img src="img/iconsHomePage/pays.png" alt="icon" width="205">
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

<script src="js/own_js.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    //createProducts()
    //printCards()
    //writePageNum()
</script>
</body>
</html>
