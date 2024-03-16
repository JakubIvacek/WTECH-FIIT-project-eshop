
let shoppingCart =[];
// Sample shopping cart items
shoppingCart = [
    { productName: 'T-shirt', quantity: 2, price: 20, image: 'img/productsHomePage/hoodie1.png' },
    { productName: 'Sweatshirt', quantity: 1, price: 30, image: 'img/productsHomePage/hoodie1.png' },
    { productName: 'Sweatshirt', quantity: 1, price: 30, image: 'img/productsHomePage/hoodie1.png' },
    { productName: 'Sweatshirt', quantity: 1, price: 35, image: 'img/productsHomePage/hoodie1.png' },
    ]

function updateCartDisplay() {
    let cartItemsHtml = '';
    if (shoppingCart.length === 0) {
        cartItemsHtml = `
    <div class="text-center fw-bold biggerForm pb-3">Your cart is empty.</div>
    <div class="text-center pb-5">
        <p>Start shopping <a href="products.html" class="text-decoration-none">here</a>.</p>
    </div>
`;
    } else {
        shoppingCart.forEach((item, index) => {
            cartItemsHtml += `
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="${item.image}" alt="${item.productName}" class="card-img-top mb-2" style="max-width: 100px;">
                        <div class="ms-3">
                            <h5 class="card-title">${item.productName}</h5>
                            <p class="card-text">Quantity: ${item.quantity}</p>
                            <p class="card-text">Price: $${item.price*item.quantity}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="dropdown">
                            <button class="btn btn-warning btn-sm dropdown-toggle" type="button" id="dropdownMenuButton_${index}" data-bs-toggle="dropdown" aria-expanded="false">
                                Quantity
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton_${index}">
                                ${generateQuantityOptions(index)}
                            </ul>
                        </div>
                        <button class="btn btn-dark btn-sm ms-2" onclick="removeItem(${index})">Remove</button>
                    </div>
                </div>
            </div>`;
        });
    }

    // add div with sum of all products
    let checkoutTotalSum = '';
    if (shoppingCart.length > 0) { // Cart has items
        let sum = 0;
        for (let i=0; i<shoppingCart.length; i++){
            sum += shoppingCart[i].price * shoppingCart[i].quantity;
        }
        checkoutTotalSum += `
        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <h5 class="card-title">Total Price</h5>
                        <p class="card-text">Price: ${sum} €</p>
                    </div>
                </div>
                  
            <div class="text-center ">
                <button class="btn btn-warning text-uppercase fw-bold" style="padding-top: 10px; padding-bottom: 10px;" onclick="checkout()">CHECKOUT</button>
            </div>
            </div>
        </div>`;

    }

    // Update the shopping cart display
    document.getElementById('shoppingCartItems').innerHTML = cartItemsHtml + checkoutTotalSum  ;
}

// Function to generate quantity options for dropdown menu
function generateQuantityOptions(index) {
    let optionsHtml = '';
    for (let i = 1; i <= 9; i++) {
        optionsHtml += `<li><button class="dropdown-item" onclick="changeQuantity(${index}, ${i})">${i}</button></li>`;
    }
    return optionsHtml;
}

// Function to remove item from the shopping cart
function removeItem(index) {
    shoppingCart.splice(index, 1);
    updateCartDisplay();
}

// Function to change quantity of an item in the shopping cart
function changeQuantity(index, quantity) {
    shoppingCart[index].quantity = quantity;
    updateCartDisplay();
}

// When the page loads, update the shopping cart display
window.onload = updateCartDisplay;
