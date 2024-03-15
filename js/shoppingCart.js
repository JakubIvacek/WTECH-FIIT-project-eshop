// JavaScript code to handle adding product to the cart
document.addEventListener("DOMContentLoaded", function() {
    // Get the add to cart button
    var addToCartBtn = document.getElementById("addToCartBtn");

    // Add click event listener to the button
    addToCartBtn.addEventListener("click", function() {
        // Get product details
        var productName = document.getElementById("productName").innerText; // Assuming there's an element with id "productName" containing the product name
        var productPrice = document.getElementById("productPrice").innerText; // Assuming there's an element with id "productPrice" containing the product price

        // Create an object representing the product
        var product = {
            name: productName,
            price: productPrice,
            quantity: 1 // Assuming default quantity is 1
        };

        // Check if cart already exists in local storage
        var cart = JSON.parse(localStorage.getItem("cart")) || [];

        // Add product to cart
        cart.push(product);

        // Store updated cart in local storage
        localStorage.setItem("cart", JSON.stringify(cart));

        // Optionally, update UI to indicate that the product has been added to cart
        alert("Product added to cart!");
    });
});
