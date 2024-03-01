let page=0;
let product="all";
let products=[];
let color="all"
let size_filters=[];
let color_filters=[];
let basicColors=["Black","White","Red","Blue"]
let price_filter = 0;

class Product{
    constructor(imageSrc, objectName, objectPrice, objectColor,  objectType, objectSize) {
        this.imageSrc = imageSrc;
        this.objectName = objectName
        this.objectPrice = objectPrice
        this.objectColor = objectColor
        this.objectType = objectType
        this.objectSize = objectSize
    }
}

function createCard(imageSrc, objectName, objectPrice, objectColor, objectSize) {
    return `
            <li style="padding: 10px;">
                <div class="card card_bg rounded-2" style="width: 18rem; height: 30rem;">
                    <img class="card-img-top img-fluid" src="${imageSrc}" height="200px" alt="Card image cap">
                    <div class="card-body bg-dark text-warning fw-bold">
                        <div class="card-header">
                              <p class="card-text">${objectName}</p>
                        </div>
                            <ul class="list-group list-group-flush bg-dark text-warning">
                            <li class="list-group-item">Price: ${objectPrice} €</li>
                            <li class="list-group-item">Color: ${objectColor}</li>
                            <li class="list-group-item">Size: ${objectSize}</li>
                        </ul>
                    </div>
                </div>
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
    cardContainer.innerHTML = "Page: " + (page + 1);
}

function createProducts(){
    for(let i = 1; i <= 34; i++){
        products.push(new Product("img/productsHomePage/shirt3.jpg",  "Card " + i,i * 10, "Black","t-shirt", "L"))
        products.push(new Product("img/productsHomePage/hoodie1.png",  "Card " + i,i * 10, "White","sweatshirt", "M"))

    }
}
function getCards(type, cardsHTML){
    let count = 0;
    let start = page;
    for (let i = 0; i < products.length; i++){
        if ((products[i].objectType === type || type === "all") && // FILTER PRODUCT TYPE
            (size_filters.length === 0 || size_filters.includes(products[i].objectSize)) && // FILTER SIZE
            (color_filters.length === 0 || color_filters.includes(products[i].objectColor) || (color_filters.includes("Other")
                && (!basicColors.includes(products[i].objectColor) || color_filters.includes(products[i].objectColor)))) // FILTER COLOR
                &&  (price_filter === 0 || price_filter >= products[i].objectPrice)) // FILTER PRICE

            {
            if (count >= (start* 12) && count <= (start*12) + 11) {
                cardsHTML += createCard(products[i].imageSrc, products[i].objectName,
                    products[i].objectPrice, products[i].objectColor, products[i].objectSize)
            }
            count++;
        }
    }
    return cardsHTML
}
function printCards(){
    let cardsHTML = '<ul class="list-unstyled d-flex flex-wrap">';
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
    document.getElementById('selectedPrice').textContent = document.getElementById('priceRange').value;

}

// Event listener for the range input change event
document.getElementById('priceRange').addEventListener('input', updateSelectedPrice);


// COLOR FILTERING STUFF
let checkboxBlack = document.getElementById('checkBlack');
let checkboxWhite = document.getElementById('checkWhite');
let checkboxBlue = document.getElementById('checkBlue');
let checkboxRed = document.getElementById('checkRed');
let checkboxOther = document.getElementById('checkOther');

checkboxBlack.addEventListener('change', function() {
    if (this.checked) {
        color_filters.push("Black")
    } else {
        removeFromListColor("Black")
    }
    printCards()
});

checkboxWhite.addEventListener('change', function() {
    if (this.checked) {
        color_filters.push("White")
    } else {
        removeFromListColor("White")
    }
    printCards()
});

checkboxRed.addEventListener('change', function() {
    if (this.checked) {
        color_filters.push("Red")
    } else {
        removeFromListColor("Red")
    }
    printCards()
});

checkboxBlue.addEventListener('change', function() {
    if (this.checked) {
        color_filters.push("Blue")
    } else {
        removeFromListColor("Blue")
    }
    printCards()
});
checkboxOther.addEventListener('change', function() {
    if (this.checked) {
        color_filters.push("Other")
    } else {
        removeFromListColor("Other")
    }
    printCards()
});


// SIZE FILTERING STUFF CHECKS
let checkboxS = document.getElementById('checkS');
let checkboxM = document.getElementById('checkM');
let checkboxL = document.getElementById('checkL');
let checkboxXL = document.getElementById('checkXL');

// Add event listener to detect checkbox state change
checkboxS.addEventListener('change', function() {
    if (this.checked) {
        size_filters.push("S")
    } else {
        removeFromList("S")
    }
    printCards()
});
// Add event listener to detect checkbox state change
checkboxM.addEventListener('change', function() {
    if (this.checked) {
        size_filters.push("M")
    } else {
        removeFromList("M")
    }
    printCards()
});
// Add event listener to detect checkbox state change
checkboxL.addEventListener('change', function() {
    if (this.checked) {
        size_filters.push("L")
    } else {
        removeFromList("L")
    }
    printCards()
});
// Add event listener to detect checkbox state change
checkboxXL.addEventListener('change', function() {
    if (this.checked) {
        size_filters.push("XL")
    } else {
        removeFromList("XL")
    }
    printCards()
});

function removeFromList(stringToRemove) {
    let index = size_filters.indexOf(stringToRemove);
    if (index !== -1) {
        size_filters.splice(index, 1);
    }
}

function removeFromListColor(stringToRemove){
    let index = color_filters.indexOf(stringToRemove);
    if (index !== -1) {
        color_filters.splice(index, 1);
    }
}