<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProfileSettings</title>
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

<!--BODY-->
<!-- Address Section -->
<div class="row justify-content-center" style="padding-top: 20px;">
    <div class="col-lg-7 col-md-10 profile-section mb-4">
        <h2 class="text-center mb-4">Address</h2>
        <form id="addressForm">
            <div class="row">
                <div class=" col-md-8 mb-3">
                    <label for="streetName" class="form-label">Street Name</label>
                    <input type="text" class="form-control" id="streetName" name="streetName"
                           placeholder="Enter street name" value="Ilkovicova" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="houseNumber" class="form-label">House Number</label>
                    <input type="text" class="form-control" id="houseNumber" name="houseNumber"
                           placeholder="Enter house number" value="2" required>
                </div>
            </div>
            <div class="row">

                <div class="col-md-8 mb-3">
                    <label for="town" class="form-label">Town</label>
                    <input type="text" class="form-control" id="town" name="town" placeholder="Enter town"
                           value="Bratislava" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="postalCode" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode"
                           placeholder="Enter postal code" value="84104" required>
                </div>
            </div>
            <button type="button" id="updateAddressBtn" class="btn btn-warning btn-block">Update Address</button>
        </form>
    </div>
</div>


<!-- Contact Info Section -->
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-10 profile-section mb-4">
        <h2 class="text-center mb-4">Contact Information</h2>
        <form id="contactInfoForm">
            <div class=" row">
                <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           placeholder="Enter your first name"
                           value="David" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName"
                           placeholder="Enter your last name"
                           value="Mackovic" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone"
                       placeholder="Enter your phone number 09XX XXX XXX"
                       value="0903456789" required>
            </div>
            <button type="submit" class="btn btn-warning btn-block">Update Contact Info</button>
        </form>
    </div>
</div>
<!-- Change Password Section -->
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-10 profile-section mb-4">
        <h2 class="text-center mb-4">Change Password</h2>
        <form id="changePasswordForm">
            <div class="mb-3">
                <label for="currentPassword" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                       placeholder="Enter current password" required>
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword"
                       placeholder="Enter new password" required>
            </div>
            <div class="mb-3">
                <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword"
                       placeholder="Confirm new password" required>
                <span id="passwordMatchError" class="text-danger"></span>
            </div>
            <button type="submit" class="btn btn-warning btn-block">Change Password</button>
        </form>
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
<script>
    $(document).ready(function () {
        // Prevent form submission
        $('#addressForm').submit(function (e) {
            e.preventDefault();
        });

        // Button click event to update address
        $('#updateAddressBtn').click(function () {
            // Perform update address functionality here
            console.log("Address updated!");
        });
    });
</script>
</body>
</html>
