let page=0;
let product="all";
let products=[];
let color="all"

class Product{
    constructor(imageSrc, objectName, objectPrice, objectColor,  objectType) {
        this.imageSrc = imageSrc;
        this.objectName = objectName
        this.objectPrice = objectPrice
        this.objectColor = objectColor
        this.objectType = objectType
    }
}

function createCard(imageSrc, objectName, objectPrice, objectColor) {
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
}

function prevPage(){
    if(page > 0){
        page-=1;
        printCards()
        writePageNum()
    }
}

function writePageNum(){
    const cardContainer = document.getElementById('pageNum');
    cardContainer.innerHTML = "Page: " + (page + 1);
}

function createProducts(){
    for(let i = 1; i <= 34; i++){
        products.push(new Product("img/productsHomePage/shirt3.jpg",  "Card " + i,99, "Black","t-shirt"))
        products.push(new Product("img/productsHomePage/hoodie1.png",  "Card " + i,99, "Black","sweatshirt"))

    }
}

function printCards(){
    let cardsHTML = '<ul class="list-unstyled d-flex flex-wrap">';
    let count = 0;
    let start = page;
    if(product === "all"){ //PRINT BOTH
         for (let i = 0; i < products.length; i++){
             if (count >= (start* 8) && count <= (start*8) + 7){
                 cardsHTML += createCard(products[i].imageSrc, products[i].objectName,
                     products[i].objectPrice, products[i].objectColor)
             }
             count++;
         }
    }else if (product === "t-shirt"){ //PRINT T-SHIRTS
        for (let i = 0; i < products.length; i++){
            if (products[i].objectType === "t-shirt"){
                if (count >= (start* 8) && count <= (start*8) + 7) {
                    cardsHTML += createCard(products[i].imageSrc, products[i].objectName,
                        products[i].objectPrice, products[i].objectColor)
                }
                count++;
            }
        }
    }else if (product === "sweatshirt"){ // PRINT Sweatshirts
        for (let i = 0; i < products.length; i++){
            if (products[i].objectType === "sweatshirt"){
                if (count >= (start* 8) && count <= (start*8) + 7) {
                    cardsHTML += createCard(products[i].imageSrc, products[i].objectName,
                        products[i].objectPrice, products[i].objectColor)
                }
                count++;
            }
        }
    }
    cardsHTML += '</ul>';
    const cardContainer = document.getElementById('cardContainer');
    cardContainer.innerHTML = cardsHTML;
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



function updateSelectedPrice() {
    let price = document.getElementById('priceRange').value;
    document.getElementById('selectedPrice').textContent = price;
}

// Event listener for the range input change event
document.getElementById('priceRange').addEventListener('input', updateSelectedPrice);
