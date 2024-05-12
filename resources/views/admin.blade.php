<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-light">
    <header class="container-fluid bg-dark">
        <div class="row">
            <ul class="list-unstyled d-flex">
                <li class="pe-5">
                    <p class="mobileBiggerHeadline fw-bold text-warning ">Admin panel</p>
                </li>
                <li>
                    <a class="mobileBiggerHeadline fw-bold text-white" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </header>
    <section class="container-fluid">
        <div class="row text-center bg-light">
            <p class="mobileBiggerHeadline fw-bold fw-bold"> Choose item to update</p>
            <div class="container-fluid w-100 " id="productBody">
                <ul class="list-unstyled d-flex flex-wrap justify-content-center">
                    @foreach ($products as $product)
                        <li style="padding: 10px;">
                            <a class="noUnderline" onclick="redirectToProductModify({{  $product->load('sizes', 'images') }})">
                                <div class="card2 card_bg2 rounded-2 heightCard2">
                                    <img class="card-img-top " width="100px" src="{{ asset($product->images->first()->imgsrc) }}" alt="Product image here">
                                    <div class="card-body  text-warning fw-bold">
                                        <div class="card-header bg-transparent border-0">
                                            <p class="mobileBiggerSmall text-dark no-underline">{{ $product->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="w-100 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
        <div class="row pb-5 justify-content-center text-center bg-dark text-light">
            <div class="col-6">
                <p class="mobileBiggerHeadline fw-bold text-warning">Modify selected product</p>
                <form id="productForm" class="justify-content-center w-100" action="{{ route('admin.modify') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <input id="priceInputMod" name="id" type="text" class="form-control biggerInput" placeholder="Enter id here" aria-label="Product ID" aria-describedby="basic-addon2">
                        @error('id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="nameInputMod" name="name" type="text" class="form-control biggerInput" placeholder="Enter name here" aria-label="Product Name" aria-describedby="basic-addon1">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="priceInputMod" name="price" type="text" class="form-control biggerInput" placeholder="Enter price here" aria-label="Product Price" aria-describedby="basic-addon2">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row align-items-center">
                        <div class="col w-50 h3">
                            <div class="col-4 ps-3 h3">
                                <p class="mobileBigger fw-bold">Select Sizes count</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">S</span>
                                    <input type="text" class="form-control" aria-label="Size S" name="size_S">
                                    @error('size_S')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">M</span>
                                    <input type="text" class="form-control" aria-label="Size M" name="size_M">
                                    @error('size_M')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">L</span>
                                    <input type="text" class="form-control" aria-label="Size L" name="size_L">
                                    @error('size_L')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">XL</span>
                                    <input type="text" class="form-control" aria-label="Size XL" name="size_XL">
                                    @error('size_XL')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col w-50">
                            <p class="mobileBigger fw-bold">Add pictures</p>
                            <div class="btn btn-primary btn-rounded mobileBiggerSmall fw-bold bg-dark">
                                <label class="form-label text-white m-1" for="customFile2">Choose files</label>
                                <input type="file" class="form-control" id="customFile2" name="photos[]" multiple />
                                @error('photos')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning text-dark mobileBiggerSmall fw-bold">Update product</button>
                        </div>
                    </div>
                </form>
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
                    <div class="container paddingStart" id="cardBody">

                    </div>
                </div>
                <form id="deleteProductForm" class="justify-content-center w-100" action="{{ route('admin.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="input-group mb-3">
                        <input id="productIdInput" name="id" type="text" class="form-control" placeholder="Enter Product ID to delete" aria-label="Product ID" aria-describedby="basic-addon2">
                        <button type="submit" class="btn btn-danger">Delete Product</button>
                    </div>
                </form>
            </div>
        </div>
        <div class=" bg-light row pt-5 pb-5 bg-light text-center justify-content-center" style="min-height: 60rem">
            <div class="col-8">
                <p class="mobileBiggerHeadline fw-bold">Add new product</p>
                <form id="productForm" class="justify-content-center w-100" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3 w-75 biggerInput">
                        <input id="nameInput" name="name" type="text" class="form-control biggerInput" placeholder="enter name here" aria-label="Product Name" aria-describedby="basic-addon1">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3 w-75 biggerInput">
                        <input id="priceInput" name="price" type="text" class="form-control biggerInput" placeholder="enter price here" aria-label="Product Price" aria-describedby="basic-addon2">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4 ps-3 h3">
                            <p class="mobileBigger fw-bold">Select Sizes count</p>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S</span>
                                <input type="text" class="form-control" aria-label="Size S" name="size_S">
                                @error('size_S')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">M</span>
                                <input type="text" class="form-control" aria-label="Size M" name="size_M">
                                @error('size_M')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">L</span>
                                <input type="text" class="form-control" aria-label="Size L" name="size_L">
                                @error('size_L')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">XL</span>
                                <input type="text" class="form-control" aria-label="Size XL" name="size_XL">
                                @error('size_XL')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="mobileBigger fw-bold">Select Color</p>
                            <select class="w75 text-dark md-4 fw-bold biggerForm form-select productsBigger" id="selectColor" name="color" aria-label="Select Color">
                                <option selected disabled>Select Color</option>
                                <option value="Black">Black</option>
                                <option value="Red">Red</option>
                                <option value="White">White</option>
                                <option value="Blue">Blue</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="form-check form-switch h3">
                                <input class="form-check-input bigger-checkbox formType" type="checkbox" id="SwitchTSHIRT" value="t-shirt" name="type">
                                <label class="form-check-label" for="SwitchTSHIRT">T-shirt</label>
                                @error('type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-check form-switch h3">
                                <input class="form-check-input bigger-checkbox formType" type="checkbox" id="SwitchHOODIE" value="sweatshirt" name="type">
                                <label class="form-check-label" for="SwitchHOODIE">Sweatshirt</label>
                            </div>
                        </div>
                    </div>
                    <p class="mobileBiggerHeadline text-start text-dark fw-bold">Add pictures</p>
                    <div class="d-flex flex-row justify-content-between ps-3">
                        <div class="btn btn-primary btn-rounded mobileBiggerSmall fw-bold bg-dark">
                            <label class="form-label text-white m-1" for="customFile2" >Choose files</label>
                            <input type="file" class="form-control" name="photos[]" multiple />
                            @error('photos')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning mobileBiggerSmall fw-bold" onclick="addProduct()">Add product</button>
                    </div>
                </form>

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
    // Get the checkboxes
    var tshirtCheckbox = document.getElementById('SwitchTSHIRT');
    var hoodieCheckbox = document.getElementById('SwitchHOODIE');

    // Add event listener to the T-shirt checkbox
    tshirtCheckbox.addEventListener('change', function() {
        if (this.checked) {
            // Set the product type to "T-shirt"
            document.getElementById('productType').value = "t-shirt";
        }
    });

    // Add event listener to the Sweatshirt checkbox
    hoodieCheckbox.addEventListener('change', function() {
        if (this.checked) {
            // Set the product type to "Sweatshirt"
            document.getElementById('productType').value = "sweatshirt";
        }
    });
</script>
</html>
