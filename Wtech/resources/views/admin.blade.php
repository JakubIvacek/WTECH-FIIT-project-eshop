<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-light">
    <header class="container-fluid bg-dark">
        <p class="mobileBiggerHeadline fw-bold text-warning">Admin panel</p>
    </header>
    <section class="container-fluid">
        <div class="row text-center bg-light">
            <p class="mobileBiggerHeadline fw-bold fw-bold"> Choose item to update</p>
            <div class="container-fluid w-100 " id="productBody">

            </div>
            <div class="container-fluid ">
                <div class="row pt-3 justify-content-center">
                    <div class="col-2 text-end align-items-center">
                        <button class="bg-transparent border-0" onclick="prevPage()">
                            <img src="img/prev_icon.jpg" alt="icon left arrow" width="35" class="pe-1 mb-2">
                            <span class="text-dark h3">Back</span>
                        </button>
                    </div>
                    <div class="col-2 text-start align-items-center">
                        <button class="bg-transparent border-0" onclick="nextPage()">
                            <span class="text-dark h3 pe-1">Next</span>
                            <img src="img/next_icon.jpg" alt="icon right arrow" width="32" class="mb-2">
                        </button>
                    </div>
                </div>
                <div class="row text-center">
                    <h3 class="text-dark" id="pageNum"></h3>
                </div>
            </div>
        </div>
        <div class="row pb-5 justify-content-center text-center bg-dark text-light">
            <div class="col-6">
                <p class="mobileBiggerHeadline fw-bold text-warning">Modify selected product</p>
                <div class="input-group mb-3">
                    <input id="nameInputModify" type="text" class="form-control biggerInput" placeholder="enter new name here" aria-label="Username" aria-describedby="pName">
                </div>
                <div class="input-group mb-3">
                    <input id="priceInputModify" type="text" class="form-control biggerInput" placeholder="enter new price here" aria-label="Username" aria-describedby="pPrice">
                </div>
                <div class="row align-items-center">
                    <div class="col w-50 h3">
                        <p class="mobileBigger fw-bold text-warning">Select New Sizes </p>
                        <div class="form-check form-switch">
                            <input class="form-check-input formSizeModify" type="checkbox" id="SwitchSM">
                            <label class="form-check-label" for="SwitchSM">S</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input formSizeModify" type="checkbox" id="SwitchMM">
                            <label class="form-check-label" for="SwitchMM">M</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input formSizeModify" type="checkbox" id="SwitchLM">
                            <label class="form-check-label" for="SwitchLM">L</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input formSizeModify" type="checkbox" id="SwitchXLM">
                            <label class="form-check-label" for="SwitchXLM">XL</label>
                        </div>
                    </div>
                    <div class="col w-50">
                        <button onclick="updateProduct()" type="button" class="mb-3 btn btn-warning text-dark mobileBiggerSmall fw-bold">Update Product</button>
                        <button onclick="deleteProduct()" type="button" class="btn btn-secondary bg-dark mobileBiggerSmall fw-bold" data-dismiss="modal">Delete Product</button>
                    </div>
                </div>
                <p id="infoUpdate" class="mobileBiggerSmall text-danger"></p>
                <p class="mobileBiggerHeadline ps-3 fw-bold text-warning">Product details</p>
                <p id="productInfo" class="mobileBiggerSmall fw-bold  ps-3">

                </p>
                <p id="productPrice" class="mobileBiggerSmall fw-bold  ps-3">

                </p>
                <p id="productSizes" class="mobileBiggerSmall fw-bold  ps-3">

                </p>
                <p class="mobileBigger ps-3 fw-bold">Product images / Upload new</p>
                <div class="col-11">
                    <div class="row">
                        <div class="col-4" id="imgDiv3">
                        </div>
                        <div class="col-4" id="imgDiv4">

                        </div>
                        <div class="col-4" id="imgDiv5">

                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-4">
                            <div class="btn btn-warning btn-rounded mobileBiggerSmall fw-bold">
                                <label class="form-label text-dark  m-1" for="customFile4">Choose file</label>
                                <input type="file" class="form-control d-none" id="customFile4" onchange="changeImg1(event, 'selectedAvatar',0)" accept="image/*" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="btn btn-warning  btn-rounded mobileBiggerSmall fw-bold">
                                <label class="form-label text-dark m-1" for="customFile5">Choose file</label>
                                <input type="file" class="form-control d-none" id="customFile5" onchange="changeImg1(event, 'selectedAvatar',1)" accept="image/*" multiple />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="btn btn-warning btn-rounded mobileBiggerSmall fw-bold">
                                <label class="form-label text-dark m-1" for="customFile6">Choose file</label>
                                <input type="file" class="form-control d-none" id="customFile6" onchange="changeImg1(event, 'selectedAvatar',2)" accept="image/*" multiple />
                            </div>
                        </div>
                    </div>
                    <div class="container paddingStart" id="cardBody">

                    </div>
                </div>
            </div>
        </div>
        <div class=" bg-light row pt-5 pb-5 bg-light text-center justify-content-center" style="min-height: 60rem">
            <div class="col-8">
                <p class="mobileBiggerHeadline fw-bold">Add new product</p>
                <div class="input-group mb-3 w-75 biggerInput">
                    <input id="nameInput" type="text" class="form-control biggerInput" placeholder="enter name here" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3 w-75 biggerInput">
                    <input id="priceInput" type="text" class="form-control biggerInput" placeholder="enter price here" aria-label="Username" aria-describedby="basic-addon2">
                </div>
                <div class="row align-items-center">
                    <div class="col-4 ps-3 h3">
                        <p class="mobileBigger fw-bold">Select Sizes</p>
                        <div class="form-check form-switch">
                            <input class="form-check-input bigger-checkbox formSize" type="checkbox" id="SwitchS">
                            <label class="form-check-label" for="SwitchS">S</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input bigger-checkbox formSize" type="checkbox" id="SwitchM">
                            <label class="form-check-label" for="SwitchM">M</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input bigger-checkbox formSize" type="checkbox" id="SwitchL">
                            <label class="form-check-label" for="SwitchL">L</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input bigger-checkbox formSize" type="checkbox" id="SwitchXL">
                            <label class="form-check-label" for="SwitchXL">XL</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="mobileBigger fw-bold">Select Color</p>
                        <select class="w75 text-dark md-4 fw-bold biggerForm form-select productsBigger" id="selectColor" aria-label="Default select example">
                            <option selected>Select Color</option>
                            <option value="Black">Black</option>
                            <option value="Red">Red</option>
                            <option value="White">White</option>
                            <option value="Blue">Blue</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="form-check form-switch h3">
                            <input class="form-check-input bigger-checkbox formType" type="checkbox" id="SwitchTSHIRT">
                            <label class="form-check-label" for="SwitchTSHIRT">T-shirt</label>
                        </div>
                        <div class="form-check form-switch h3">
                            <input class="form-check-input bigger-checkbox formType" type="checkbox" id="SwitchHOODIE">
                            <label class="form-check-label" for="SwitchHOODIE">Sweatshirt</label>
                        </div>
                    </div>
                </div>
                <p class="mobileBiggerHeadline text-start text-dark fw-bold">Add pictures </p>
                <div class="d-flex flex-row justify-content-between ps-3">
                    <div class="btn btn-primary btn-rounded mobileBiggerSmall fw-bold bg-dark">
                        <label class="form-label text-white m-1" for="customFile2">Choose files</label>
                        <input type="file" class="form-control d-none" id="customFile2" onchange="validateSelectedImages(event, 'selectedAvatar')" accept="image/*" multiple />
                    </div>
                    <div class=" btn btn-warning mobileBiggerSmall fw-bold" onclick="addProduct()">
                        Add product
                    </div>
                </div>
                <div id="infoimg" class="mobileBiggerSmall text-danger"></div>
                <div class="row">
                    <div id="imgdiv0" class="col-4"></div>
                    <div id="imgdiv1" class="col-4"></div>
                    <div id="imgdiv2" class="col-4"></div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/admin_js.js"></script>
<script>
    createProducts()
    printProducts()
    writePageNum()
</script>
</html>
