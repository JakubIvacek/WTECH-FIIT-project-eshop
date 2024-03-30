products = []

class Product{
    constructor(imageSrc, objectName, objectPrice, objectColor,  objectType, objectSizes) {
        this.imageSrc = imageSrc;
        this.objectName = objectName
        this.objectPrice = objectPrice
        this.objectColor = objectColor
        this.objectType = objectType
        this.objectSizes = objectSizes
    }
}

function createCard(imageSrc, objectName, objectPrice, objectColor, objectSize, object) {
    return `
        <div class="container-fluid  rounded-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 d-block d-xl-none">
                    <div id="productCarousel" class="carousel slide " data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- First slide -->
                            <div class="carousel-item active">
                                <img src="${imageSrc[0]}" class="d-block w-100" alt="product image first slide">
                            </div>
                            <!-- Second slide -->
                            <div class="carousel-item">
                                <img src="${imageSrc[1]}" class="d-block w-100" alt="product image second slide">
                            </div>
                            <!-- Second slide -->
                            <div class="carousel-item">
                                <img src="${imageSrc[2]}" class="d-block w-100" alt="product image third slide">
                            </div>
                        </div>
                        <!-- Carousel controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <img src="img/prev_icon.jpg" width="40" alt="icon left arrow">
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <img src="img/next_icon.jpg" width="40" alt="icon right arrow">
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="row-xl-12 d-none d-xl-block d-flex flex-row">
                    <ul class="d-flex flex-row list-unstyled">
                    <li>
                         <img src="${imageSrc[0]}" class="d-block img-fluid" alt="product first image"> 
                    </li>
                    <li>
                        <img src="${imageSrc[1]}" class="d-block w-50" alt="product second image"> 
                        <img src="${imageSrc[2]}" class="d-block w-50" alt="product third image">         
                    </li>
                    
                    </ul>
                </div>
            </div>
            <div class="row">
                 <div class="card-body text-warning fw-bold">
                        <div class="card-header bg-transparent border-0">
                            <p class="mobileBigger text-dark no-underline fw-bold ps-4">${objectName}</p>
                        </div>
                        <ul class="ps-2 list-group list-group-flush border-0 mobileBiggerCloseup mobileBiggerCloseup2">                     
                            <li class="list-group-item border-0 no-underline">Sizes : ${objectSize}</li>
                            <li class="list-group-item border-0">Price : ${objectPrice} € </li>
                        </ul>     
                    </div>
            </div>
            <div class="container row pb-3 ps-4 sizeSelectInput">
                
        ` +  setSizesProduct(object) +"        </div>\n        </div> ";
}
function setSizesProduct(product){
    let string = "<select class=\"border-0 border-bottom border-end border-black border-5 w75 text-dark md-4 fw-bold biggerForm form-select biggerInput \"  id=\"sizeSelectInput\" aria-label=\"Default select example\">                 <option selected>Select Size</option>     "
    for (let i=0;i<product.objectSizes.length;i++){
        string += " <option value='"+ i + "'>" + product.objectSizes[i] + "</option>"
    }
    string += "</select>"
    return string
}
function createProducts(){
    // TU sa z db bude brat info
    for(let i = 1; i <= 32; i++){
        products.push(new Product(["img/productsHomePage/shirt3.jpg", "img/productsHomePage/shirt3.jpg", "img/productsHomePage/shirt3.jpg"],  "Card " + i * 5,(35 - i) * 10, "Black","t-shirt", ["S","L"]))
        products.push(new Product(["img/productsHomePage/hoodie1.png", "img/productsHomePage/hoodie1.png", "img/productsHomePage/hoodie1.png"],  "Card " + i + i * 7,(35 - i) * 10, "White","sweatshirt", ["M","XL"]))

    }
}

function getProductName(){
    // GET PRODUCTS NAME FROM URL
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const productName = urlParams.get('productName');
    let productCard = ""
    createProducts()
    // FIND OUR PRODUCT
    for(let i=0;i<products.length;i++){
        console.log(products[i].objectName)
        if(products[i].objectName === productName) {
            console.log(products[i].objectName + " " + products[i].imageSrc)
            productCard = createCard(products[i].imageSrc, products[i].objectName, products[i].objectPrice, products[i].objectColor, products[i].objectSizes, products[i])
        }
    }
    const cardContainer = document.getElementById('cardBody');

    cardContainer.innerHTML = productCard
}