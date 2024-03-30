<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
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
                            <a href="/login." class="navbar-brand">
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
<!-- SIGN UP FORM -->
<section class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-xl-6 col-lg-8  profile-section mb-4 ">
            <h2 class="text-center mb-4">Sign Up</h2>
            <form id="signupForm" action="{{route('signup')}}" method="post" >
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your first name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="surname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter your last name" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password (at least 8 characters with a number)" required>
                    <span id="passwordError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for="repeatPassword" class="form-label">Repeat Password</label>
                    <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="Repeat your password" required>
                </div>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="street" class="form-label">Street Name</label>
                        <input type="text" class="form-control" id="street" name="street" placeholder="Enter street name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="street_num" class="form-label">Street Number</label>
                        <input type="text" class="form-control" id="street_num" name="street_num" placeholder="Enter street number" required>
                        <span id="streetNumberError" class="text-danger"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="town" class="form-label">Town</label>
                        <input type="text" class="form-control" id="town" name="town" placeholder="Enter town" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="postalCode" class="form-label">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Enter postal code" required>
                        <span id="postalCodeError" class="text-danger"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">I agree to the terms and conditions</label>
                </div>
                <button type="submit" value="Save" class="btn btn-warning btn-block">Sign Up</button>
            </form>
            <p class="text-center mt-3">Already have an account? <a href="/login">Log In</a></p>
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
<script src="js/bootstrap.bundle.min.js"></script>

<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var streetNumber = document.getElementById("streetNumber").value;
        var postalCode = document.getElementById("postalCode").value;

        var passwordError = document.getElementById("passwordError");
        var streetNumberError = document.getElementById("streetNumberError");
        var postalCodeError = document.getElementById("postalCodeError");

        // Validate password
        if (password.length < 8 || !/\d/.test(password)) {
            passwordError.textContent = "Password must be at least 8 characters long and contain at least 1 number.";
            return false;
        } else {
            passwordError.textContent = "";
        }

        // Validate if password and repeat password are the same
        if (password !== document.getElementById("repeatPassword").value) {
            passwordError.textContent = "Passwords do not match.";
            return false;
        } else {
            passwordError.textContent = "";
        }

        // Validate street number
        if (!/^\d+$/.test(streetNumber)) {
            streetNumberError.textContent = "Street number must be a number.";
            return false;
        } else {
            streetNumberError.textContent = "";
        }

        // Validate postal code
        if (!/^[A-Za-z0-9\s]+$/.test(postalCode)) {
            postalCodeError.textContent = "Postal code must contain only alphanumeric characters.";
            return false;
        } else {
            postalCodeError.textContent = "";
        }

        //Validate number
        if (!/^\d+$/.test(phone)) {
            phoneError.textContent = "Phone number must be a number.";
            return false;
        } else {
            phoneError.textContent = "";
        }
        return true;
    }
</script>

</body>
</html>
