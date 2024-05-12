let page=0;
let product="all";
let products=[];
let color="all"
//let size_filter="none";
//let color_filter="none"
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
                <div class="card card_bg rounded-2 heightCard">
                    <img class="card-img-top img-fluid" src="${imageSrc[0]}" alt="Product image here">
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
    cardContainer.innerHTML = "<span class='fw-bold mobileBigger text-warning'>"+ (page + 1) +"</span>"  + " " + (page + 2) + " " + (page + 3)
}


document.getElementById('priceRange').addEventListener('input', function() {
    var selectedPrice = this.value;
    document.getElementById('selectedPrice').textContent = selectedPrice;
});

/*function changeToShirts(){
    page=0;
    product="t-shirt";
    printCards()
    writePageNum()
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
}*/
// Function to filter products by the "T-shirts" category
function changeToShirts() {
    window.location.href = '/products?type=t-shirt';
}

// Function to filter products by the "Sweatshirts" category
function changeToSweatshirts() {
    window.location.href = '/products?type=sweatshirt';
}

// Function to display all products
function changeToAll() {
    window.location.href = '/products';
}
function filterPrice() {
    var selectedPrice = document.getElementById('priceRange').value;
    window.location.href = '/products?price=' + selectedPrice;
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

document.getElementById('selectOrder').addEventListener('change', function() {
    var selectedValue = this.value;
    window.location.href = '/products?sort=' + selectedValue;
});

// COLOR INPUT SELECT
document.getElementById("selectColor").addEventListener("change", function() {
    let selectedValue = this.value;
    let color_filter="none"
    switch(selectedValue) {
        case "1":
            color_filter =  "Black"
            break;
        case "2":
            color_filter = "Red"
            break;
        case "3":
            color_filter = "White"
            break;
        case "4":
            color_filter = "Blue"
            break;
        case "5":
            color_filter = "Other"
            break;
        case "6":
            color_filter = "All"
            break;
        default:
            color_filter = "none"
            break;
    }
    if (color_filter === "All"){
        window.location.href = '/products'
    }else
    window.location.href = '/products?color=' + color_filter;
});
document.getElementById('selectSize').addEventListener('change', function() {
    let selectedValue = this.value;
    let size_filter = "";

    switch(selectedValue) {
        case "1":
            size_filter = "S";
            break;
        case "2":
            size_filter = "M";
            break;
        case "3":
            size_filter = "L";
            break;
        case "4":
            size_filter = "XL";
            break;
        case "5":
            size_filter = "All"
            break;
        default:
            size_filter = "";
            break;
    }
    if (size_filter === "All"){
        window.location.href = '/products'
    }else
    window.location.href = '/products?size=' + size_filter;
});

/*function applyFilters() {
    var selectedSize = document.getElementById('selectSize').value;
    var selectedColor = document.getElementById('selectColor').value;
    var selectedPrice = document.getElementById('priceRange').value;
    var selectedOrder = document.getElementById('selectOrder').value;

    var params = [];

    if (selectedSize) {
        let selectedValue = selectedSize.value;
        let size_filter = "";

        switch(selectedValue) {
            case "1":
                size_filter = "S";
                break;
            case "2":
                size_filter = "M";
                break;
            case "3":
                size_filter = "L";
                break;
            case "4":
                size_filter = "XL";
                break;
            default:
                size_filter = "none";
                break;
        }
        params.push('size=' + size_filter);
    }

    if (selectedColor) {
        let selectedValue = selectedColor.value;
        let color_filter="none"
        switch(selectedValue) {
            case "1":
                color_filter =  "Black"
                break;
            case "2":
                color_filter = "Red"
                break;
            case "3":
                color_filter = "White"
                break;
            case "4":
                color_filter = "Blue"
                break;
            case "5":
                color_filter = "Other"
                break;
            default:
                color_filter = "none"
                break;
        }
        params.push('color=' + color_filter);
    }

    if (selectedPrice) {
        params.push('price=' + selectedPrice);
    }
    if (selectedOrder){
        params.push('sort=' + selectedOrder)
    }
    // Construct the URL with all selected filters
    var url = '/products';
    if (params.length > 0) {
        url += '?' + params.join('&');
    }

    // Redirect to the constructed URL
    window.location.href = url;
}
*/
