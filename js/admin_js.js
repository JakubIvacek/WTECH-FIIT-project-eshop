let products = []
let page=0;

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
function nextPage(){
    page+=1;
    printProducts()
    writePageNum()

}

function prevPage(){
    if(page > 0){
        page-=1;
        printProducts()
        writePageNum()

    }
}

function writePageNum(){
    const cardContainer = document.getElementById('pageNum');
    cardContainer.innerHTML = "<span class='fw-bold mobileBigger text-warning'>"+ (page + 1) +"</span>"  + " " + (page + 2) + " " + (page + 3)
}
function createCard(imageSrc, objectName, objectPrice, objectColor, objectSize) {
    return `
            <li style="padding: 10px;">
                <a href="javascript:void(0)" class="noUnderline" onclick="redirectToProductModify('${objectName}')">
                <div class="card2 card_bg2 rounded-2 heightCard2">
                    <img class="card-img-top " width="100px" src="${imageSrc}" alt="Product image shows here">
                    <div class="card-body  text-warning fw-bold">
                        <div class="card-header bg-transparent border-0">
                              <p class="mobileBigger text-dark no-underline">${objectName}</p>
                        </div>
                    </div>
                </div>
                </a>
            </li>
        `;
}

function createProducts(){
    // TU sa z db bude brat info
    for(let i = 1; i <= 32; i++){
        products.push(new Product("img/productsHomePage/shirt3.jpg",  "Card " + i * 5,(35 - i) * 10, "Black","t-shirt", ["S","L"]))
        products.push(new Product("img/productsHomePage/hoodie1.png",  "Card " + i + i * 7,(35 - i) * 10, "White","sweatshirt", ["M","XL"]))

    }
}
function printProducts(){
    let count = 0;
    let start = page;
    createProducts()
    let cardsHTML = '<ul class="list-unstyled d-flex flex-wrap justify-content-center">';
    for (let i = 0; i < 32; i++) {
        if (count >= (start* 10) && count <= (start*10) + 9){
            cardsHTML += createCard(products[i].imageSrc, products[i].objectName,
                products[i].objectPrice, products[i].objectColor, products[i].objectSizes);
        }
        count++;
    }
    cardsHTML += '</ul>';
    const cardContainer = document.getElementById('productBody');
    cardContainer.innerHTML = cardsHTML;

}
function redirectToProductCloseup(productName) {
    
}

function validateSelectedImages(event, targetId) {
    var input = event.target;
    var files = input.files;
    var imagesCount = 0;

    for (var i = 0; i < files.length; i++) {
        // Check if the file type is an image
        if (files[i].type.match('image.*')) {
            imagesCount++;
        } else {
            // If a non-image file is found, display an error message
            displayErrorMessage("Please select only image files.");
            input.value = ''; // Clear the selected files
            return;
        }
    }

    var infoDiv = document.getElementById('infoimg');

    if (imagesCount < 5) {
        displayErrorMessage("Please select at least 5 images.");
        input.value = ''; // Clear the selected files
    } else {
        infoDiv.innerHTML = ""; // Clear any previous message
        displaySelectedImage(event, targetId);
    }
}

function displaySelectedImage(event, targetId) {
    // Your existing code to display selected images goes here
    // This function is called only if validation passes
}

function displayErrorMessage(message) {
    var infoDiv = document.getElementById('infoimg');
    infoDiv.innerHTML = message;
}

function createCardModify(imageSrc, objectName, objectPrice, objectColor, objectSize) {
    return `
            <li style="padding: 10px; list-style:none">
                <a href="javascript:void(0)" class="noUnderline">
                <div class="card card_bg rounded-2 heightCard">
                    <img class="card-img-top img-fluid" src="${imageSrc}" alt="Product image shows here">
                    <div class="card-body  text-warning fw-bold">
                        <div class="card-header bg-transparent border-0">
                              <p class="mobileBigger text-dark no-underline">${objectName}</p>
                        </div>
                            <ul class="list-group list-group-flush border-0 mobileBiggerSmall">                     
                            <li class="list-group-item border-0 no-underline">Size: ${objectSize}</li>
                             <li class="list-group-item border-0 ">Price: ${objectPrice} €</li>
                        </ul>     
                    </div>
                </div>
                </a>
            </li>
        `;
}
function redirectToProductModify(productName) {
    let productCard = ""
    createProducts()
    // FIND OUR PRODUCT
    for(let i=0;i<products.length;i++){
        console.log(products[i].objectName)
        if(products[i].objectName === productName) {
            console.log(products[i].objectName + " " + products[i].imageSrc)
            productCard = createCardModify(products[i].imageSrc, products[i].objectName, products[i].objectPrice, products[i].objectColor, products[i].objectSizes, products[i])
        }
    }
    //console.log(productCard)
    const cardContainer = document.getElementById('cardBody');

    cardContainer.innerHTML = productCard
}
