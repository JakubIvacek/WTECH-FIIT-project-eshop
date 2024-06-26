
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<script>
    // Save item id and count into local storage if added into cart
    function saveItemLocalStorage() {
        var selectedOption = document.getElementById('dd').value;
        var product = localStorage.getItem('cartItem' + localStorage.getItem('product'))
        if(!product){
            localStorage.setItem('cartItem' + localStorage.getItem('product'), selectedOption);
        }else{
            localStorage.setItem('cartItem' + localStorage.getItem('product'), selectedOption);
        }
        window.location.reload()
    }
</script>
<body>
<!-- HEADER -->
<header class="header container-fluid bg-dark justify-content-center align-items-center text-light pb-5">
    <div class="row justify-content-center align-items-center d-flex">
        <div class="col-3 mt-3">
            <a href="/" class="navbar-brand mt-3">
                <img class="rounded-4 smaller" src="{{asset('img/iconsHomePage/icon.png')}}" alt="" height="85">
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
                                <img src="{{asset('img/iconsHomePage/login.png')}}" alt="" height="60">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/shoppingCart" class="navbar-brand">
                                <img src="{{asset('img/iconsHomePage/icons8-cart-64.png')}}" alt="" height="69">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="border-dark height1000 col-12 antialiased"  id="cardContainer">
                <div>
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid row justify-content-center pb-3">
        <div class="col-4">
            <a href="#" class="">
                <button class="bg-warning btn btn-warning btn-lg fw-bold w-100" type="button" data-toggle="modal" data-target="#exampleModal">
                    <span class="biggerInput fw-bold">Add to cart</span>
                </button>
            </a>

            <!-- Modal -->
            <div class="modal p-5" id="exampleModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="modal-title h2 fw-bold">Select product count</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="h2 fw-bold">How many to add to the cart</p>
                            <div class="input-group mb-3">
                                <label for="dd"></label><select class="custom-select biggerInput border-0 border-bottom border-end border-black border-4" id="dd">
                                    <option selected>select here</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                </select>
                            </div>

                        <div class="modal-footer">
                            <!-- Add to cart button -->
                            <button id="addToCartBtn" class="bg-warning btn btn-warning btn-lg fw-bold w-100" type="button" onclick="addToCart()">
                                <span class="biggerInput fw-bold">Add to cart</span>
                            </button>
                            <button type="button" class="ps-5 btn btn-secondary bg-dark mobileBiggerSmall fw-bold" data-dismiss="modal">Back</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12">
            <a href="/products" class="">
                <button type="button" class="btn btn-lg fw-bold w-100 bg-dark text-white" >
                    <span class="biggerInput fw-bold">Back</span>
                </button>
            </a>
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
                        <img src="{{asset('img/iconsHomePage/right-arrow.jpg')}}" alt="icon" width="40px">
                    </button>
                </div>
            </div>
            <h4 class="mb-4 ms-5 mobileBiggerSmall">subscribe to our news with your email :)</h4>
            <h2 class="mb-3 mobileBigger text-warning">Follow Us</h2>
            <div class="row w-40">
                <div class="col mb-5 ms-3">
                    <img width="30" src="{{asset('img/iconsHomePage/instagram-white-icon.png')}}" alt="icon">
                    <img width="30" src="{{asset('img/iconsHomePage/tiktok-round-white-icon.svg')}}" alt="icon">
                    <img width="30" src="{{asset('img/iconsHomePage/threads-white-icon.svg')}}" alt="icon">
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">
                    <img src="{{asset('img/iconsHomePage/pays.png')}}" alt="icon" width="205">
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    //createProducts()
    //printCards()
    //writePageNum()
    const ddSelect = document.getElementById('dd');
    const sizeSelect = document.getElementById('size');

    // Event listener for the dropdown select
    ddSelect.addEventListener('change', function () {
        localStorage.setItem('ddSelection', ddSelect.value);
    });

    // Event listener for the size select
    sizeSelect.addEventListener('change', function () {
        localStorage.setItem('sizeSelection', sizeSelect.value);
    });
    function addToCart(){
        const id  = localStorage.getItem('product');
        const sizeSelection = localStorage.getItem('sizeSelection');
        const contSelection = localStorage.getItem('ddSelection');
        window.location.href = 'cart/' + id + '/' + contSelection + '/' + sizeSelection
    }
</script>
</body>
</html>
