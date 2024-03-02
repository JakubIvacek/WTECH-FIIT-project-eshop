let page=0;
let product="all";
let products=[];
let color="all"
let size_filter="none";
let color_filter="none"
let basicColors=["Black","White","Red","Blue"]
let price_filter = 0;
let order="none"

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

function createCard(imageSrc, objectName, objectPrice, objectColor, objectSize) {
    return `
            <li style="padding: 10px;">
                <a href="javascript:void(0)" class="noUnderline" onclick="redirectToProductCloseup('${objectName}')">
                <div class="card card_bg rounded-2" style="width: 16rem; height: 31rem;">
                    <img class="card-img-top img-fluid" src="${imageSrc}" height="180px" alt="Product image shows here">
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
function nextPage(){
    page+=1;
    printCards()
    writePageNum()
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

function prevPage(){
    if(page > 0){
        page-=1;
        printCards()
        writePageNum()
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }
}

function writePageNum(){
    const cardContainer = document.getElementById('pageNum');
    cardContainer.innerHTML = "-> "+(page + 1) + " " + (page + 2) + " " + (page + 3)
}

function createProducts(){
    for(let i = 1; i <= 34; i++){
        products.push(new Product("img/productsHomePage/shirt3.jpg",  "Card " + i,(35 - i) * 10, "Black","t-shirt", ["S","L"]))
        products.push(new Product("img/productsHomePage/hoodie1.png",  "Card " + i,(35 - i) * 10, "White","sweatshirt", ["M","XL"]))

    }
}
function getCards(type, cardsHTML){
    let count = 0;
    let start = page;
    //ORDERING PRODUCTS IF NEEDED
    let products_sorted = [];
    if (order === "LH") {
        console.log("LH")
        products_sorted = products.sort((a, b) => a.objectPrice - b.objectPrice);

    } else if (order === "HL") {
        console.log("HL")
        products_sorted = products.sort((a, b) => b.objectPrice - a.objectPrice);

    } else if (order === "AB") {
        console.log("AB")
        products_sorted= products.sort((a, b) => {
            if (a.objectName < b.objectName) return -1;
            if (a.objectName > b.objectName) return 1;
            return 0;
        });
    } else if (order === "none") {
        console.log("none")
        products_sorted = products;
    }
    products_sorted.forEach(product => {
        console.log(product.objectName + ": $" + product.objectPrice);
    });
    //FILTER PRODUCTS IN ORDER IF NEEDED
    let products_filtered=[]
    for (let i = 0; i < products_sorted.length; i++){
        if ((products_sorted[i].objectType === type || type === "all") && // FILTER PRODUCT TYPE
            (size_filter === "none" || products_sorted[i].objectSizes.includes(size_filter)) && (products_sorted[i].objectColor === color_filter || color_filter === "none")
            &&  (price_filter === 0 || price_filter >= products_sorted[i].objectPrice)) // FILTER PRICE
            {
            if (count >= (start* 12) && count <= (start*12) + 11) {
                products_filtered.push(products_sorted[i])
            }
            count++;
        }
    }
    for (let i = 0; i < products_filtered.length; i++) {
        cardsHTML += createCard(products_filtered[i].imageSrc, products_filtered[i].objectName,
            products_filtered[i].objectPrice, products_filtered[i].objectColor, products_filtered[i].objectSizes);
    }
    return cardsHTML
}
function printCards(){
    let cardsHTML = '<ul class="list-unstyled d-flex flex-wrap justify-content-center">';
    cardsHTML = getCards(product, cardsHTML)
    cardsHTML += '</ul>';
    const cardContainer = document.getElementById('cardContainer');
    cardContainer.innerHTML = cardsHTML;
}

function filterPrice(){
    price_filter = document.getElementById('priceRange').value;
    printCards()

}

function changeToShirts(){
    page=0;
    product="t-shirt";
    printCards()
    writePageNum()
}
function changeToSweatshirts(){
    page=0;
    product="sweatshirt";
    printCards()
    writePageNum()
}

function changeToAll(){
    page=0;
    product="all"
    printCards()
    writePageNum()
}
// PRICE FILTERING
function updateSelectedPrice() {
    page=0
    writePageNum()
    document.getElementById('selectedPrice').textContent = document.getElementById('priceRange').value;
    page=0
}

// Event listener for the range input change event
document.getElementById('priceRange').addEventListener('input', updateSelectedPrice);


function redirectToProductCloseup(productName) {
    window.location.href = `productCloseup.html?productName=${productName}`;
}
// ORDERING PRODUCTS
document.getElementById("selectOrder").addEventListener("change", function() {
    let selectedValue = this.value;
    page=0
    writePageNum()
    switch(selectedValue) {
        case "1":
            order="LH"
            printCards()
            break;
        case "2":
            order="HL"
            printCards()
            break;
        case "3":
            order="AB"
            printCards()
            break;
        default:
            order="none"
            printCards()
            break;
    }
});
// COLOR INPUT SELECT
document.getElementById("selectColor").addEventListener("change", function() {
    let selectedValue = this.value;
    page=0
    writePageNum()
    switch(selectedValue) {
        case "1":
            color_filter =  "Black"
            printCards()
            break;
        case "2":
            color_filter = "Red"
            printCards()
            break;
        case "3":
            color_filter = "White"
            printCards()
            break;
        case "4":
            color_filter = "Blue"
            printCards()
            break;
        case "5":
            color_filter = "Other"
            printCards()
            break;
        default:
            color_filter = "none"
            printCards()
            break;
    }
});
// SIZE INPUT SELECT
document.getElementById("selectSize").addEventListener("change", function() {
    let selectedValue = this.value;
    page=0
    writePageNum()
    switch(selectedValue) {
        case "1":
            size_filter = "S"
            printCards()
            break;
        case "2":
            size_filter = "M"
            printCards()
            break;
        case "3":
            size_filter = "L"
            printCards()
            break;
        case "4":
            size_filter = "XL"
            printCards()
            break;
        default:
            size_filter="none"
            printCards()
            break;
    }
});