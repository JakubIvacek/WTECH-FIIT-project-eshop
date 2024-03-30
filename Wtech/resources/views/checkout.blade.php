<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
<!-- HEADER -->
<header class="header container-fluid bg-dark justify-content-center align-items-center text-light pb-3">
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
                        <li class="nav-item " style="margin-right: 14px;">
                            <a href="/" class="nav-link" aria-current="page">
                                <p class="customColor mobileBiggerLink">Home</p>
                            </a>
                        </li>
                        <li class="nav-item mr-8">
                            <a href="/products" class="nav-link active">
                                <p class="mobileBiggerLink customColor">
                                    Products</p>
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
                        <input id="formSearch" type="text" class="form-control" placeholder="enter search"
                               aria-label="Search query" aria-describedby="basic-addon2">
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

<section class="bg-light py-5">
    <div class="container  jd-flex justify-content-between align-content-center ">
        <div class="row ">
            <div class="col-xl-8 col-lg-12 mb-5 ">
                <div class=" mb-5  profile-section">
                    <div class="p-4 d-flex justify-content-between ">
                        <div class="">
                            <h5>Have an account?</h5>
                            <p class="text-muted mb-0">Sign in to speed up the checkout process</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-center flex-column flex-md-row">
                            <a href="#" class="btn btn-outline-warning me-0 me-md-2 mb-2 mb-md-0 w-100">Register</a>
                            <a href="#" class="btn btn-warning shadow-0 text-nowrap w-100">Sign in</a>
                        </div>
                    </div>
                </div>

                <!-- Checkout -->
                <div class=" profile-section mb-5">
                    <div class="p-4 ">
                        <h5 class="card-title mb-3">Guest checkout</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                       placeholder="Enter your first name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName"
                                       placeholder="Enter your last name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Enter your email" required>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                       placeholder="Enter your phone number" required>
                            </div>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/>
                            <label class="form-check-label" for="flexCheckDefault">Keep me up to date on news</label>
                        </div>

                        <hr class="my-4"/>

                        <h5 class="card-title mb-3">Shipping info</h5>

                        <div class="row mb-3">
                            <div class="col-lg-6 mb-3">
                                <!-- Default checked radio -->
                                <div class="form-check h-100 border rounded-3" id="deliveryOptionFast">
                                    <div class="p-3">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                               id="flexRadioDefault1" checked/>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Express delivery <br/>
                                            <small class="text-muted">3-4 days </small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <!-- Default radio -->
                                <div class="form-check h-100 border rounded-3" id="deliveryOptionStandard">
                                    <div class="p-3">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                               id="flexRadioDefault2"/>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Standard delivery <br/>
                                            <small class="text-muted">7-10 days </small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="streetName" class="form-label">Street Name</label>
                                <input type="text" class="form-control" id="streetName" name="streetName"
                                       placeholder="Enter street name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="streetNumber" class="form-label">Street Number</label>
                                <input type="text" class="form-control" id="streetNumber" name="streetNumber"
                                       placeholder="Enter street number" required>
                                <span id="streetNumberError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="town" class="form-label">Town</label>
                                <input type="text" class="form-control" id="town" name="town" placeholder="Enter town"
                                       required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="postalCode" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postalCode" name="postalCode"
                                       placeholder="Enter postal code" required>
                                <span id="postalCodeError" class="text-danger"></span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="profile-section">
                    <div class="p-4 mt-1">
                        <!-- Payment Options -->
                        <h5 class="card-title">Payment Options</h5>
                        <form id="paymentForm">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentOption" value="cashOnDelivery" id="cashOnDelivery" checked>
                                <label class="form-check-label" for="cashOnDelivery">
                                    Cash on Delivery
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentOption" value="onlinePayment" id="onlinePayment">
                                <label class="form-check-label" for="onlinePayment">
                                    Online Payment
                                </label>
                            </div>
                        </form>
                        <!-- Online Payment Inputs -->
                        <div id="onlinePaymentInputs" class="mt-3" style="display: none;">
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" placeholder="XXXX-XXXX-XXXX-XXXX" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="expiryDate" class="form-label">Expiry Date</label>
                                        <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/?([0-9]{2})$" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cvv" placeholder="XXX" pattern="[0-9]{3}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Other card details -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-4 col-lg-12 d-flex justify-content-center justify-content-xl-end">
                <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
                    <h6 class="mb-3">Summary</h6>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Total price:</p>
                        <p class="mb-2">$195.90</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Discount:</p>
                        <p class="mb-2 text-danger">- $60.00</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Shipping cost:</p>
                        <p class="mb-2">+ $14.00</p>
                    </div>
                    <hr/>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Total price:</p>
                        <p class="mb-2 fw-bold">$149.90</p>
                    </div>

                    <div class="input-group mt-3 mb-4">
                        <input type="text" class="form-control border" name="" placeholder="Promo code"/>
                        <button class="btn btn-light text-dark border">Apply</button>
                    </div>

                    <hr/>
                    <h6 class="text-dark my-4">Items in cart</h6>

                    <div class="d-flex align-items-center mb-4">
                        <div class="me-3 position-relative">
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                1
              </span>
                            <img src="img/productsHomePage/hoodie1.png"
                                 style="height: 96px; width: 96px;" class="img-sm rounded border"/>
                        </div>
                        <div class="">
                            <a href="#" class="nav-link">
                                T-shirt <br/>
                                L
                            </a>
                            <div class="price text-muted">Total: $295.99</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="me-3 position-relative">
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                1
              </span>
                            <img src="img/productsHomePage/hoodie1.png"
                                 style="height: 96px; width: 96px;" class="img-sm rounded border"/>
                        </div>
                        <div class="">
                            <a href="#" class="nav-link">
                                T-shirt <br/>
                                M
                            </a>
                            <div class="price text-muted">Total: $217.99</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="me-3 position-relative">
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                3
              </span>
                            <img src="img/productsHomePage/hoodie1.png"
                                 style="height: 96px; width: 96px;" class="img-sm rounded border"/>
                        </div>
                        <div class="">
                            <a href="#" class="nav-link">T-shirt</a>
                            XXL</br>

                            <div class="price text-muted">Total: $910.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-end mt-5 justify-content-center">
                <button class="btn btn-lg btn-dark border">Cancel</button>
                <button class="btn btn-lg btn-warning shadow-0 border">Continue</button>
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
                <input id="formEmail" type="text" class="form-control" placeholder="enter your e-mail"
                       aria-label="Recipient's username" aria-describedby="basic-addon2">
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
<script src="js/checkout.js"></script>
</body>
</html>
