let products = []
let page=0;
let imageSrcArray = []
let productSelectedName = ""


class Product{
    constructor(imageSrcs, objectName, objectPrice, objectColor,  objectType, objectSizes) {
        this.imageSrc = imageSrcs;
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
function createCard(imageSrcs, objectName, objectPrice, objectColor, objectSize) {
    return `
            <li style="padding: 10px;">
                <a href="javascript:void(0)" class="noUnderline" onclick="redirectToProductModify('${objectName}')">
                <div class="card2 card_bg2 rounded-2 heightCard2">
                    <img class="card-img-top " width="100px" src="${imageSrcs[0]}" alt="Product image shows here">
                    <div class="card-body  text-warning fw-bold">
                        <div class="card-header bg-transparent border-0">
                              <p class="mobileBiggerSmall text-dark no-underline">${objectName}</p>
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
        products.push(new Product(["img/productsHomePage/shirt3.jpg", "img/productsHomePage/shirt3.jpg", "img/productsHomePage/shirt3.jpg"],  "Card " + i * 5,(35 - i) * 10, "Black","t-shirt", ["S","L"]))
        products.push(new Product(["img/productsHomePage/hoodie1.png", "img/productsHomePage/hoodie1.png", "img/productsHomePage/hoodie1.png"],  "Card " + i + i * 7,(35 - i) * 10, "White","sweatshirt", ["M","XL"]))

    }
}
function printProducts(){
    let count = 0;
    let start = page;
    let cardsHTML = '<ul class="list-unstyled d-flex flex-wrap justify-content-center">';
    for (let i = 0; i < products.length; i++) {
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
    let input = event.target;
    let files = input.files;
    var imagesCount = 0;
    var imgDivs = ["imgdiv0", "imgdiv1", "imgdiv2"]

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();
        if (files) {
            let count = i;
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.addEventListener("load", function () {
                document.getElementById(imgDivs[count]).innerHTML = '<img src="' + this.result + '" alt="choosen uploaded img" class="img-fluid maxWidth"/>';
                imageSrcArray.push(this.result)
            });
        }
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

    if (imagesCount !== 3) {
        displayErrorMessage("Please select 3 images.");
        input.value = ''; // Clear the selected files
    } else {
        infoDiv.innerHTML = ""; // Clear any previous message
        displaySelectedImage(event, targetId);
    }
}

function displaySelectedImage(event, targetId) {
    document.getElementById('infoimg').innerHTML = "3 images choosen"
}

function displayErrorMessage(message) {
    var infoDiv = document.getElementById('infoimg');
    infoDiv.innerHTML = message;
}

function createCardModify(imageSrcs, objectName, objectPrice, objectColor, objectSize) {
    return `
           <a href="javascript:void(0)" class="noUnderline">
                <div class="card card_bg rounded-2 heightCard">
                    <div id="productCarousel" class="carousel slide " data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- First slide -->
                            <div class="carousel-item active">
                                <img src="${imageSrcs[0]}" class="d-block img-fluid" alt="First slide">
                            </div>
                            <!-- Second slide -->
                            <div class="carousel-item">
                                <img src="${imageSrcs[1]}" class="d-block img-fluid" alt="Second slide">
                            </div>
                             <!-- Second slide -->
                            <div class="carousel-item">
                                <img src="${imageSrcs[2]}" class="d-block img-fluid" alt="Second slide">
                            </div>
                        </div>
                        <!-- Carousel controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <img src="img/prev_icon.jpg" width="40" alt="icon">
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <img src="img/next_icon.jpg" width="40" alt="icon">
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
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
        `;
}
function redirectToProductModify(productName) {
    let productCard = ""
    let productChoosen
    // FIND OUR PRODUCT
    for(let i=0;i<products.length;i++){
        if(products[i].objectName === productName) {
            productChoosen = products[i]
            //productCard = createCardModify(products[i].imageSrc, products[i].objectName, products[i].objectPrice, products[i].objectColor, products[i].objectSizes, products[i])
        }
    }
    document.getElementById("productInfo").innerHTML = "Name : " + productChoosen.objectName
    document.getElementById("productPrice").innerHTML = " Price : " + productChoosen.objectPrice
    document.getElementById("productSizes").innerHTML = " Sizes : " + productChoosen.objectSizes

    document.getElementById("imgDiv3").innerHTML = '<img src="' + productChoosen.imageSrc[0] + '" alt="choosen uploaded img" class="img-fluid maxWidth"/>';
    document.getElementById("imgDiv4").innerHTML = '<img src="' +  productChoosen.imageSrc[1] + '" alt="choosen uploaded img" class="img-fluid maxWidth"/>';
    document.getElementById("imgDiv5").innerHTML = '<img src="' +  productChoosen.imageSrc[2] + '" alt="choosen uploaded img" class="img-fluid maxWidth"/>';
    productSelectedName = productChoosen.objectName
    //console.log(productCard)
    const cardContainer = document.getElementById('cardBody');
    cardContainer.innerHTML = productCard
}
function deleteProduct(){
    let new_products = []
    for(let i=0;i<products.length;i++){
        if(products[i].objectName !== productSelectedName){
            new_products.push(products[i])
        }
    }
    products = new_products
}
function updateProduct() {
    let name = document.getElementById("nameInputModify").value
    let price = document.getElementById("priceInputModify").value
    let checkboxes = document.querySelectorAll('.formSizeModify')
    let sizes = []
    let checkedCheckboxes = [];
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            checkedCheckboxes.push(checkbox.id);
        }
        checkbox.checked = false;
    });
    if(checkedCheckboxes.includes("SwitchSM"))
        sizes.push("S")
    if(checkedCheckboxes.includes("SwitchMM"))
        sizes.push("M")
    if(checkedCheckboxes.includes("SwitchLM"))
        sizes.push("L")
    if(checkedCheckboxes.includes("SwitchXLM"))
        sizes.push("XL")
    console.log(sizes)
    for(let i=0;i<products.length;i++){
        if(products[i].objectName === productSelectedName){
            products[i].objectName = name;
            productSelectedName = name;
            products[i].objectPrice = price;
            products[i].objectSizes = sizes
        }
    }
    redirectToProductModify(productSelectedName)
}

function addProduct(){
    if(imageSrcArray.length !== 3){
        document.getElementById("infoimg").innerHTML= "cant add choose imgs"
        return
    }
    let name = document.getElementById("nameInput").value
    let price = document.getElementById("priceInput").value
    let color = document.getElementById("selectColor").value
    if( name === "" || price === "" || color === "Select Color"){
        document.getElementById("infoimg").innerHTML= "cant add fill out all info"
        return
    }
    let type = ""
    let sizes = []
    console.log(price)
    console.log(color)
    let checkboxes = document.querySelectorAll('.formSize')
    let checkedCheckboxes = [];
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            checkedCheckboxes.push(checkbox.id);
        }
        checkbox.checked = false;
    });
    if(checkedCheckboxes.length === 0){
        document.getElementById("infoimg").innerHTML= "cant add select sizes"
        return
    }
    if(checkedCheckboxes.includes("SwitchS"))
        sizes.push("S")
    if(checkedCheckboxes.includes("SwitchM"))
        sizes.push("M")
    if(checkedCheckboxes.includes("SwitchL"))
        sizes.push("L")
    if(checkedCheckboxes.includes("SwitchXL"))
        sizes.push("XL")

    checkboxes = document.querySelectorAll('.formType')
    checkedCheckboxes = []
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            checkedCheckboxes.push(checkbox.id);
        }
        checkbox.checked = false;
    });
    if(checkedCheckboxes.length === 0){
        document.getElementById("infoimg").innerHTML= "cant add select type"
        return
    }
    if(checkedCheckboxes[0] === "SwitchTSHIRT")
        type = "t-shirt"
    else if(checkedCheckboxes[0] === "SwitchHOODIE")
        type = "sweatshirt"
    // TU PRIDAVANIE DO DBS TODO
    products.push(new Product(imageSrcArray, name, price, color,type,sizes  ))
    document.getElementById("infoimg").innerHTML= "product added"
    imageSrcArray = []
    document.getElementById("nameInput").innerHTML = ""
    document.getElementById("priceInput").innerHTML = ""
    document.getElementById("imgdiv0").innerHTML = ""
    document.getElementById("imgdiv1").innerHTML = ""
    document.getElementById("imgdiv2").innerHTML = ""
    let select = document.getElementById("selectColor")
    select.selectedIndex = 0;
    printProducts()

}

function changeImg1(event, targetId,index){
    let input = event.target;
    let files = input.files;
    var file = files[0];
    let divs = ["imgDiv3", "imgDiv4", "imgDiv5"]

    const fileReader = new FileReader();
    fileReader.readAsDataURL(file);
    fileReader.addEventListener("load", function () {
        for(let i=0;i<products.length;i++){
            if(products[i].objectName === productSelectedName){
                products[i].imageSrc[index] = this.result
                console.log(this.result)
                document.getElementById(divs[index]).innerHTML = '<img src="' + products[i].imageSrc[index] + '" alt="choosen uploaded img" class="img-fluid maxWidth"/>';
            }
        }
    });
    redirectToProductModify(productSelectedName)
}