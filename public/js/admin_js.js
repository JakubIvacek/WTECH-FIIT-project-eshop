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
                    <img class="card-img-top " width="100px" src="${imageSrcs[0]}" alt="Product image here">
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

function validateSelectedImages(event, targetId) {
    let input = event.target;
    let files = input.files;
    let imagesCount = 0;
    let imgDivs = ["imgdiv0", "imgdiv1", "imgdiv2"]

    for (let i = 0; i < files.length; i++) {
        let file = files[i];
        let reader = new FileReader();
        if (files) {
            let count = i;
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.addEventListener("load", function () {
                document.getElementById(imgDivs[count]).innerHTML = '<img src="' + this.result + '" alt="choosen uploaded img" class="img-fluid maxWidth"/>';
                imageSrcArray.push(this.result)
            });
        }
    }
    let infoDiv = document.getElementById('infoimg');

    if (imagesCount !== 3) {
        let infoDiv = document.getElementById('infoimg');
        infoDiv.innerHTML = "Please select 3 images.";
        input.value = '';
    } else {
        infoDiv.innerHTML = "";
        document.getElementById('infoimg').innerHTML = "3 images choosen"
    }
}

function redirectToProductModify(product) {
    // Update the DOM with the product data
    console.log(product.sizes);
    console.log(product.images);

    document.getElementById("productInfo").innerHTML = "Name: " + product.name;
    document.getElementById("productPrice").innerHTML = "Price: " + product.price + " ID : " + product.id;
    // Construct the sizes string
    let sizesString = "Sizes: ";
    product.sizes.forEach(size => {
        sizesString += size.size + " (" + size.count + "), ";
    });
    // Remove the trailing comma and space
    sizesString = sizesString.slice(0, -2);
    document.getElementById("productSizes").innerHTML = sizesString;

    // Display the images
    document.getElementById("imgDiv3").innerHTML = '<img src="' + product.images[0].imgsrc + '" alt="choosen uploaded img" class="img-fluid maxWidth"/>';
    document.getElementById("imgDiv4").innerHTML = '<img src="' + product.images[1].imgsrc + '" alt="choosen uploaded img" class="img-fluid maxWidth"/>';
    document.getElementById("imgDiv5").innerHTML = '<img src="' + product.images[2].imgsrc + '" alt="choosen uploaded img" class="img-fluid maxWidth"/>';
}



function deleteProduct(){
    let new_products = []
    for(let i=0;i<products.length;i++){
        if(products[i].objectName !== productSelectedName){
            new_products.push(products[i])
        }
    }
    products = new_products
    document.getElementById("infoUpdate").innerHTML= "product deleted"
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
    document.getElementById("infoUpdate").innerHTML= "product updated"
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
