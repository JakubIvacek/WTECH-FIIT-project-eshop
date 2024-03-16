
    // Sample shopping cart items
    const shoppingCart = [
    { productName: 'T-shirt', quantity: 2, price: 20, image: 'img/productsHomePage/hoodie1.png' },
    { productName: 'Sweatshirt', quantity: 1, price: 30, image: 'img/productsHomePage/hoodie1.png' },
    { productName: 'Sweatshirt', quantity: 1, price: 30, image: 'img/productsHomePage/hoodie1.png' },
    { productName: 'Sweatshirt', quantity: 1, price: 35, image: 'img/productsHomePage/hoodie1.png' },
    ];

    function updateCartDisplay() {
    let cartItemsHtml = '';
    shoppingCart.forEach((item, index) => {
    cartItemsHtml += `
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="${item.image}" alt="${item.productName}" class="card-img-top mb-2" style="max-width: 100px;">
                            <div class="ms-3">
                                <h5 class="card-title">${item.productName}</h5>
                                <p class="card-text">Quantity: ${item.quantity}</p>
                                <p class="card-text">Price: $${item.price}</p>
                            </div>
                        </div>
                        <div>
                         <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quantity
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    ${generateQuantityOptions(index)}
                                </ul>
                            <button class="btn btn-dark me-2" onclick="removeItem(${index})">Remove</button>
                            <div class="dropdown">

                            </div>
                        </div>
                    </div>
                </div>
            `;
});

    document.getElementById('shoppingCartItems').innerHTML = cartItemsHtml;
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
